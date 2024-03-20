<?php

namespace App\Console\Commands;

use App\Models\NotificationGroup;
use App\Models\User;
use Illuminate\Console\Command;
use App\Services\NotificationApiService;

class SendNotifCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notif Verification Mudik';

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
        $users = User::where('status_mudik', 'diterima')->where('status_notification', 0)->whereNull('group_id')->orderBy('id', 'asc')->limit(10)->get();
        $groupNotif = NotificationGroup::where('status', 'sending')->exists();
        if ($users && !$groupNotif) {
            $groupWa = new NotificationGroup();
            $groupWa->status = 'sending';
            $groupWa->created_at = date('Y-m-d H:i:s');
            $groupWa->save();
            $ttlAnggota = 0;
            foreach ($users as $key => $user) {
                $ttlAnggota++;
                $param = [
                    'target' => $user->phone,
                    'message' => "*Informasi*:\nYth. Bapak/Ibu Peserta Mudik Gratis Tahun 2024\n\nSehubungan pencocokan data peserta Mudik Gratis tahun 2024 telah dilaksanakan oleh panitia melalui data yang tersimpan dalam aplikasi jawaramudik.bantenprov.go.id, maka *tidak lagi diperlukan kehadiran* Bapak/Ibu dalam acara Verifikasi peserta pada tanggal *22-23 Maret 2024*.\n\nDemikian atas perhatian dan kerjasamanya, diucapkan terima kasih.\n\nUntuk informasi lebih lanjut dapat menghubungi Call Centre di 0852 1080 8700"
                ];
                $this->notificationApiService->sendNotification($param);
                User::where('id', $user->id)->update([
                    'status_notification' => 1,
                    'send_date' => date('Y-m-d H:i:s'),
                    'group_id' => $groupWa->id
                ]);
                if ($ttlAnggota == $users->count()) {
                    NotificationGroup::where('id', $groupWa->id)->update([
                        'status' => 'delivered',
                        'total_anggota' => $users->count(),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
                $this->info("User $user->email deleted because confirmation wasn't completed within one hour.");
                sleep(5);
            }
        }
        $this->info('notification verification successfully.');
    }
}
