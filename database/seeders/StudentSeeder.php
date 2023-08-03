<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            for ($i=0;$i<10;$i++){
                $students[] = [
                   "name" => "tinsdat No".$i,
                    "gender" => 1,
                    "phone" => "01234567".$i,
                    "address" => "Ha Noi",
                    "image" => ""
                ];
            }
            DB::table('students')->insert($students);
    }
}
