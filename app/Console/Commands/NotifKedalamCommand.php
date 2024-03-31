<?php

namespace App\Console\Commands;

use App\Models\NotificationGroup;
use App\Models\User;
use Illuminate\Console\Command;
use App\Services\NotificationApiService;

class NotifKedalamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:kedalam';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notif Kedalam Provinsi Banten';

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
        $users = User::with('kotatujuan')->where('status_mudik', 'diterima')->where('tujuan', 2)->orderBy('id', 'asc')->limit(1)->get();
        $groupNotif = NotificationGroup::where('status', 'sending')->exists();
        if ($users && !$groupNotif) {
            $groupWa = new NotificationGroup();
            $groupWa->status = 'sending';
            $groupWa->created_at = date('Y-m-d H:i:s');
            $groupWa->save();
            $ttlAnggota = 0;
            foreach ($users as $key => $user) {
                $ttlAnggota++;
                $kotaTujuan = $user->kota_tujuan;
                switch ($kotaTujuan) {
                    case 10:
                        # Kalideres
                        $tujuan = 'Kalideres-Banten';
                        $tglBerangkat = '6 April 2024';
                        $lokasi = 'Jalan Pintu 2 Kalideres';
                        $jam = '14:00';
                        break;
                    case 11:
                        # Tanjung Priok
                        $tujuan = 'Tanjung Priok-Banten';
                        $tglBerangkat = '6 April 2024';
                        $lokasi = 'Terminal Tanjung Priok';
                        $jam = '14:00';
                        break;
                    case 12:
                        # Kota Yogyakarta
                        $tujuan = 'Yogyakarta-Banten';
                        $tglBerangkat = '4 April 2024';
                        $lokasi = 'Terminal Giwangan';
                        $jam = '20:00';
                        break;
                    case 13:
                        $tujuan = 'Bandung-Banten';
                        $tglBerangkat = '5 April 2024';
                        $lokasi = 'Terminal Leuwipanjang';
                        $jam = '20:00';
                        # Kota Bandung
                        break;
                    case 14:
                        # Kota Bogor
                        $tujuan = 'Bogor-Banten';
                        $tglBerangkat = '6 April 2024';
                        $lokasi = 'Terminal Baranangsiang';
                        $jam = '12:00';
                        break;
                    default:
                        # code...
                        $tujuan = '';
                        $tglBerangkat = '';
                        $lokasi = '';
                        $jam = '';
                        break;
                }
                $param = [
                    'target' => $user->phone,
                    'message' => "Informasi waktu dan Tempat keberangkatan asal tujuan *" . $tujuan . "* :  Keberangkatan Tanggal *" . $tglBerangkat . "* Titik kumpul & lokasi keberangkatan  di *" . $lokasi . "* waktu keberangkatan Pukul *" . $jam . "*, usahakan 1 jam sebelum keberangkatan sudah di lokasi karena ada proses registrasi dan pembagian perlengkapan peserta dan pemberhentian terakhir di Terminal Mandala, Terminal Kadubanen dan terminal Pakupatan\nTerima kasih.\n*NB:*\nMembawa foto copy KTP dan KK"
                ];
                $this->notificationApiService->sendNotification($param);
                User::where('id', $user->id)->update([
                    'status_notification' => 3,
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
                $this->info("User $user->phone deleted because confirmation wasn't completed within one hour.");
                sleep(5);
            }
        }
        $this->info('notification verification successfully.');
    }
}
