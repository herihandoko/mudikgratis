<?php

namespace App\Console\Commands;

use App\Models\NotifHistory;
use App\Models\NotificationGroup;
use App\Models\User;
use Illuminate\Console\Command;
use App\Services\NotificationApiService;

class SendMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notif Peserta Mudik';

    protected $notificationApiService;
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
        $notifHistory = NotifHistory::where('status', 'sent')->limit(10)->get();
        foreach ($notifHistory as $key => $value) {
            $param = [
                'target' => $value->recipient_number,
                'message' => $value->message
            ];
            $this->notificationApiService->sendNotification($param);
            NotifHistory::where('id', $value->id)->update([
                'delivered_at' => date('Y-m-d H:i:s'),
                'status' => 'delivered'
            ]);
            sleep(5);
        }
        $this->info('notification message successfully.');
    }
}
