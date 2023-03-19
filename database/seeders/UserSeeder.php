<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\UserRegister;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = \Carbon\Carbon::now(); // method call to create a new Carbon instance with the current date and time. 
                                    //Carbon is a popular date and time library for PHP 

        // DB::table('register')->insert([
        //     'name' => 'ram',
        //     'password'=>'qwe12345',
        //     'email' => 'ram12345@gmail.com',
        //     'addresss'=>'kalimati',
        // ]);
        UserRegister::create([
            'name' => 'shyam',
            'password'=>'xaxaxa111',
            'email' => 'xaxaxa@gmail.com',
            'addresss'=>'kalimati',
        ]);
        DB::table('login')->insert([
                'email' => 'xaxaxa@gmail.com',
                'password'=>'xaxaxa111',
            ]);
    }
}
