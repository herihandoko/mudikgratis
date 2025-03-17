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

class CleanCancelledCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:cancelled';
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
        $pesertas = Peserta::where('status', 'dibatalkan')->get();
        foreach ($pesertas as $key => $peserta) {
            $dataPeserta = $peserta->toArray();
            unset($dataPeserta['id']);
            $dataPeserta['created_at'] = date('Y-m-d H:i:s', strtotime($dataPeserta['created_at']));
            $dataPeserta['updated_at'] = date('Y-m-d H:i:s', strtotime($dataPeserta['updated_at']));
            $id = PesertaCancelled::insert($dataPeserta);
            if ($id) {
                Peserta::where('id', $peserta->id)->delete();
            }
        }
        $users = User::where('status_mudik', 'dibatalkan')->get();
        foreach ($users as $keyx => $user) {
            $dataUser = $user->toArray();
            unset($dataUser['id']);
            unset($dataUser['peserta']);
            $dataUser['email_verified_at'] = date('Y-m-d H:i:s', strtotime($dataUser['email_verified_at']));
            $dataUser['created_at'] = date('Y-m-d H:i:s', strtotime($dataUser['created_at']));
            $dataUser['updated_at'] = date('Y-m-d H:i:s', strtotime($dataUser['updated_at']));
            $id = UserInactive::insert($dataUser);
            if ($id) {
                $dataUser = $user->toArray();

                $notifHistory = new NotifHistory();
                $notifHistory->recipient_number = $dataUser['phone'];
                $notifHistory->message  = "Notifikasi Jawara Mudik, \nAccount Jawara Mudik an:" . $dataUser['name'] . " telah berhasil dibatalkan\n\nTerima kasih atas partisipasi Anda dalam mudik gratis\nSalam\nTim Jawara Mudik";
                $notifHistory->status = 'sent';
                $notifHistory->created_by = auth()->user()->name;
                $notifHistory->source = 'send-message';
                $notifHistory->save();

                User::where('id', $user->id)->delete();
            }
        }
        $this->info('Unconfirmed users deleted cancelled successfully.');
    }
}
