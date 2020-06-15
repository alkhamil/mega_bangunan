<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['admin','staff','pelanggan'];
        foreach ($users as $key => $u) {
            DB::table('users')->insert([
                'username' => $u,
                'role_id' => $key+1,
                'email' => $u.'@email.com',
                'password' => Hash::make($u),
            ]);
        }
    }
}
