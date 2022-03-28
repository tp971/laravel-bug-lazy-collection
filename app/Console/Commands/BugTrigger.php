<?php

namespace App\Console\Commands;

use App\Models\Entry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BugTrigger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bug:trigger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counter = [];
        for($i = 1; $i <= 48555; $i++)
            $counter[$i] = 0;

        //all of these three variants have the same issue

        /*foreach(Entry::orderBy('date')->lazy() as $entry) {
            //echo $entry->id."\n";
            $counter[$entry->id]++;
        }*/

        /*Entry::orderBy('date')->lazy()->each(function ($entry) use (&$counter) {
            //echo $entry->id."\n";
            $counter[$entry->id]++;
        });*/

        DB::table('entries')->orderBy('date')->lazy()->each(function ($entry) use (&$counter) {
            //echo $entry->id."\n";
            $counter[$entry->id]++;
        });

        for($i = 1; $i <= 48555; $i++)
            if($counter[$i] !== 1)
                echo "entry #$i occured {$counter[$i]} times, expected 1\n";
        return 0;
    }
}
