<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        for($i = 0; $i < 9711; $i++)
            $insert[] = [ 'date' => "2022-03-14" ];
        for($i = 0; $i < 9711; $i++)
            $insert[] = [ 'date' => "2022-03-15" ];
        for($i = 0; $i < 9711; $i++)
            $insert[] = [ 'date' => "2022-03-16" ];
        for($i = 0; $i < 9711; $i++)
            $insert[] = [ 'date' => "2022-03-17" ];
        for($i = 0; $i < 9711; $i++)
            $insert[] = [ 'date' => "2022-03-18" ];
        DB::table('entries')->insert($insert);
    }
}
