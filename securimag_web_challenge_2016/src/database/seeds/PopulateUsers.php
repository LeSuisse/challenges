<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PopulateUsers extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            array('name' => 'admin', 'password' => md5('RjC8jBdfch*8RJMSWc8C@7mFJ6J269')),
            array('name' => 'sheep_lover', 'password' => md5('Soay_Sheep'))
        ));
    }
}