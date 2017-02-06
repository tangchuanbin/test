<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(30)->make();
        User::insert($users->toArray());//在这里toArray因为user的model里password和remember_token是隐藏的所有不会保存

        // User::insert(['name' => "abcd",
        //         'email' => "abbb",
        //         'password' => "ccd",
        //         'remember_token' => str_random(10)]);

        $user = User::find(1);
        $user->name = 'test';
        $user->email = 'test@test.com';
        $user->password = 'test';
        $user->save();
    }
}
