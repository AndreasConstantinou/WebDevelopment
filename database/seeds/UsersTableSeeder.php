<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name="Krikkos";
        $user->email="giakoumis@gmail.com";
        $user->password="12345678";
        $user->save();

        factory(App\User::class, 2)->create();


    }
}
