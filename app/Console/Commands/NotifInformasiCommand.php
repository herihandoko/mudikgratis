<?php

namespace App\Console\Commands;

use App\Models\NotifHistory;
use App\Models\NotificationGroup;
use App\Models\User;
use Illuminate\Console\Command;
use App\Services\NotificationApiService;

class NotifInformasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:informasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notif Informasi Mudik';

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
        $users = User::where('status_mudik', 'diterima')->where('status_notification', '<=', 3)->where('periode_id', 2)->orderBy('id', 'asc')->limit(10)->get();
        $groupNotif = NotificationGroup::where('status', 'sending')->exists();
        if ($users && !$groupNotif) {
            $groupWa = new NotificationGroup();
            $groupWa->status = 'sending';
            $groupWa->created_at = date('Y-m-d H:i:s');
            $groupWa->save();
            $ttlAnggota = 0;
            $dataMessage = [];
            foreach ($users as $key => $user) {
                $ttlAnggota++;
                $message = "Informasi Resmi Mudik Gratis  Pemerintah Provinsi Banten Tahun 2026 bisa di liat langsung melalui :\n1.⁠ ⁠Instagram Dishub Banten https://www.instagram.com/share/p/_ZCamx-rs\n2.⁠ ⁠Pendaftaran dan info kota tujuan serta rute lintasan dapat di akses melalui link https://jawaramudik.bantenprov.go.id/\n3.⁠ ⁠Syarat utama pendaftar E-KTP Provinsi Banten dan pendaftaran dibuka pukul 00.01 WIB pada tanggal 18 Februari s/d 1 maret 2026\n4.⁠ ⁠Tanggal keberangkatan Maret 2026 (tanggal tentatif menyesuaikan libur bersama) dan titik lokasi keberangkatan di Kawasan Pusat Pemerintahan Provinsi Banten(KP3B) Palima Kota Serang\n5.⁠ ⁠Tutorial dan Tata Cara Pendaftaran Mudik Gratis Tahun 2026\n5.1.⁠ ⁠Modul tata cara pendaftaran mudik Dishub Banten https://ppid.bantenprov.go.id/storage/document/buku-panduan-mudik-gratis-aplikasi-jawaramudik-202502191646.pdf\n5.2.⁠ ⁠Vidio tutorial https://www.instagram.com/reel/DGQBvhfTIe_/?igsh=MWR2MXlydmJxZHZ1ZA==";
                $param = [
                    'target' => $user->phone,
                    'message' => $message
                ];
                $this->notificationApiService->sendNotification($param);
                User::where('id', $user->id)->update([
                    'status_notification' => 4,
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
                $dataMessage[] = [
                    'recipient_number' => $user->phone,
                    'message' => $message,
                    'status' => 'delivered',
                    'sent_at' => date('Y-m-d H:i:s'),
                    'delivered_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 'system-jawara',
                    'source' => 'send-message'
                ];
                $this->info("'notification informasi mudik successfully.");
                sleep(5);
            }
            if ($dataMessage)
                NotifHistory::insert($dataMessage);
        }
        $this->info('notification verification successfully.');
    }
}
