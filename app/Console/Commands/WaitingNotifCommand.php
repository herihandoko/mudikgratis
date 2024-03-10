<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserInactive;
use App\Services\NotificationApiService;
use Carbon\Carbon;

class WaitingNotifCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'waiting:notif';
    protected $notificationApiService;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notif Waiting';

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
        $threshold = Carbon::now()->subHour();
        $unconfirmedUsers = User::where('status_profile', 1)
            ->where('status_mudik', 'waiting')
            ->where('created_at', '<=', $threshold)
            ->get();

        foreach ($unconfirmedUsers as $user) {
            $param = [
                'target' => $user->phone,
                'message' => "[Konfirmasi Daftar Mudik] - Jawara Mudik \nDaftar peserta mudik Anda belum terkirim, silahkan login ke dashboard Jawara Mudik Anda, lengkapi dan klik Kirim.  \n\nTerima kasih"
            ];
            $this->notificationApiService->sendNotification($param);
            $this->info("Waiting notification successfully.");
        }
        $this->info('Waiting notification successfully.');
    }
}
