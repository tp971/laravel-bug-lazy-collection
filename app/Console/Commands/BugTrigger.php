<?php

namespace App\Console\Commands;

use App\Models\Entry;
use Illuminate\Console\Command;

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
        foreach(Entry::orderBy('date')->lazy() as $entry) {
            //echo $entry->id."\n";
            $counter[$entry->id]++;
        }
        for($i = 1; $i <= 48555; $i++)
            if($counter[$i] !== 1)
                echo "entry #$i occured {$counter[$i]} times, expected 1\n";
        return 0;
    }
}
