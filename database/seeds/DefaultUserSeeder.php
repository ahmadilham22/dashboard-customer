<?php

use App\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Super Admin',
            'email'     =>  'demo@kazee.inventory',
            'password'  => bcrypt('secret123'),
            'role'      => 'superadmin'
        ]);
    }
}
