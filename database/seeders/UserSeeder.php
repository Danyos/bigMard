<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => '1','name' => 'Daniel Hambardzumyan',
                'email' => 'daniel.hambardzumyan97@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XWxMPAu58V2vZ2Sa4y2bFecMXNkbdNb5tfMPrnhb93ORByzQGNI4i',
                'remember_token' => NULL,
                'created_at' => '2023-04-13 09:51:26',
                'updated_at' => '2023-04-13 09:51:26'],
            ['id' => '2',
                'name' => 'Arman',
                'email' => 'bigmardaccess@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XWxMPAu58V2vZ2Sa4y2bFecMXNkbdNb5tfMPrnhb93ORByzQGNI4i',
                'remember_token' => NULL,
                'created_at' => '2023-04-13 09:51:26',
                'updated_at' => '2023-04-13 09:51:26'],
       ];

        User::insert($users);
    }
}
