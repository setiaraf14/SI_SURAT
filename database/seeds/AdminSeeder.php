<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@admin.admin',
            'role'      => 'Kepala-Dinas',
            'password'  => Hash::make('q1w2e3r4'),
        ]);
    }
}
