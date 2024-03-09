<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserInactive;
use App\Services\NotificationApiService;
use Carbon\Carbon;

class CleanRegisterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-unconfirmed';
    protected $notificationApiService;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete unconfirmed users who have not confirmed their registration within one hour';

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
        $threshold = Carbon::now()->subHour();
        $unconfirmedUsers = User::where('status_profile', 0)
            ->where('created_at', '<=', $threshold)
            ->get();

        foreach ($unconfirmedUsers as $user) {
            if ($user->peserta->count() == 0) {
                $dataUser = $user->toArray();
                if ($dataUser) {
                    unset($dataUser['id']);
                    $dataUser['email_verified_at'] = date('Y-m-d H:i:s', strtotime($dataUser['email_verified_at']));
                    $dataUser['created_at'] = date('Y-m-d H:i:s', strtotime($dataUser['created_at']));
                    $dataUser['updated_at'] = date('Y-m-d H:i:s', strtotime($dataUser['updated_at']));
                    $id = UserInactive::insert($dataUser);
                    if ($id) {
                        $user->delete();
                        $param = [
                            'target' => $user->phone,
                            'message' => "[Delete Akun Mudik] - Jawara Mudik \nUser email " . $user->email . " telah di hapus, karena tidak melengkapi profil dan data peserta dalam waktu satu jam setelah pendaftaran  \n\nTerima kasih"
                        ];
                        $this->notificationApiService->sendNotification($param);
                        $this->info("User $user->email deleted because confirmation wasn't completed within one hour.");
                    }
                }
            }
        }
        $this->info('Unconfirmed users deleted successfully.');
    }
}
