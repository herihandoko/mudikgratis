<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserInactive;
use App\Services\NotificationApiService;
use Carbon\Carbon;

class KuotaSynchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kuota:synch';
    protected $notificationApiService;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Untuk synch kuota user mudik';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(NotificationApiService $notificationApiService)
    {
        $this->notificationApiService = $notificationApiService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set("Asia/Jakarta");
        $users = User::whereIn('status_mudik', ['diterima', 'dikirim'])->get();
        foreach ($users as $key => $user) {
            if ($user->jumlah != $user->peserta->count()) {
                User::where('id', $user->id)->update([
                    'jumlah' => $user->peserta->count()
                ]);
            }
        }
        $this->info('Syncronize successfully.');
    }
}
