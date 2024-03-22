<?php

namespace App\Console\Commands;

use App\Models\NotificationGroup;
use App\Models\User;
use Illuminate\Console\Command;
use App\Services\NotificationApiService;

class NotifTwibbonizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:twibbonize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notif Twibbonize Mudik';

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
        $users = User::where('status_mudik', 'diterima')->where('status_notification', 1)->orderBy('id', 'asc')->limit(10)->get();
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
                    'message' => "_Assalamualaikum Wr. Wb._\n\nHallo Warga sedulur Banten,Dalam rangka Mudik Bareng, Mudik Bahagia bersama Pemerintah Provinsi Banten”, bersama-sama kita meriahkan dengan memakai bingkai twibbone milik Pemerintah Provinsi Banten.\n\nBerikut kami sampaikan link bingkai untuk di pasang foto terbaik serta dibagikan ke media sosial.\n\nhttps://twb.nz/mudik2024banten\n\n *Mudik Ceria, Penuh Makna*\n\n_Wa'alaikumsalam Wr. Wb._"
                ];
                $this->notificationApiService->sendNotification($param);
                User::where('id', $user->id)->update([
                    'status_notification' => 2,
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
            }
        }
        $this->info('notification verification successfully.');
    }
}
