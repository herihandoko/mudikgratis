<?php

namespace App\Console\Commands;

use App\Models\Peserta;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserInactive;
use App\Services\NotificationApiService;
use Carbon\Carbon;

class CleanStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'peserta:status';
    protected $notificationApiService;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status peserta';

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
        $pesertas = Peserta::select('id', 'user_id')->whereNull('status')->get();
        foreach ($pesertas as $key => $peserta) {
            # code...
            $user = User::find($peserta->user_id);
            Peserta::where('id', $peserta->id)->update([
                'status' => $user->status_mudik
            ]);
        }
        $this->info('Update status peserta.');
    }
}
