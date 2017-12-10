<?php

use Illuminate\Database\Seeder;

use App\User as UserEloquent;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserEloquent::create([
        	'name'=>'管理者',
        	'email'=>'admin@mail.com',
        	'password'=>bcrypt('admin'),
            'type'=>1
        ]);
    }
}
