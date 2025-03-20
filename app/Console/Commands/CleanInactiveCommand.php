<?php

namespace App\Console\Commands;

use App\Models\NotifHistory;
use App\Models\Peserta;
use App\Models\PesertaCancelled;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserInactive;
use App\Services\NotificationApiService;
use Carbon\Carbon;

class CleanInactiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:clean-inactive';
    protected $notificationApiService;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Karantine Cancelled';

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
        $users = UserInactive::where('status_mudik', 'deleted')->where('periode_id', 4)->get();
        foreach ($users as $keyx => $user) {
            $stsUpdate = UserInactive::where('id', $user->id)->update(['status_mudik' => 'dibatalkan']);
            if ($stsUpdate) {
                $dataUser = $user->toArray();
                $notifHistory = new NotifHistory();
                $notifHistory->recipient_number = $dataUser['phone'];
                $notifHistory->message  = "Notifikasi Jawara Mudik, \nAccount Jawara Mudik an:" . $dataUser['name'] . " telah berhasil dibatalkan\n\nTerima kasih atas partisipasi Anda dalam mudik gratis\nSalam\nTim Jawara Mudik";
                $notifHistory->status = 'sent';
                $notifHistory->created_by = $dataUser['name'];
                $notifHistory->source = 'send-message';
                $notifHistory->save();
            }
        }
        $this->info('Unconfirmed users deleted cancelled successfully.');
    }
}
