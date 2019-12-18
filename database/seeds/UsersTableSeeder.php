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
      $user->name="Johny";
      $user->email="bGoode@gmail.com";
      $user->password="1234";
      $user->save();

      factory(App\User::class, 4)->create();
      //another way to create users with attached relationship to posts for each user
      factory(App\User::class, 3)->create()->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make());
    });

    }
}
