<?php

namespace App\Console\Commands;


use App\Models\Product\ItemModel;
use Illuminate\Console\Command;

use Carbon\Carbon;

class UpdateExpiredItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:update-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Թարմացնում է ապրանքների կարգը, եթե ակտիվացման ժամանակն ավարտվել է։';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Գտնում ենք բոլոր ապրանքները, որոնց order_time ավարտվել է
        $expiredItems = ItemModel::whereNotNull('order_time')
            ->where('order_time', '<', Carbon::now())
            ->get();

        foreach ($expiredItems as $item) {
            // Վերադարձնում ենք order_time-ը NULL
            $item->order_time = null;
            $item->save();
        }

        $this->info('Ապրանքները թարմացվեցին։');
        return Command::SUCCESS;
    }
}
