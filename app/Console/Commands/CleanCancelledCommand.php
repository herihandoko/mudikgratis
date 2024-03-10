<?php

namespace App\Console\Commands;

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
        $this->info('Unconfirmed users deleted successfully.');
    }
}
