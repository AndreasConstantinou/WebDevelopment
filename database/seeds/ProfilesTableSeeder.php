<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $profile=new Profile;
      $profile->jobTitle="Computer Developer";
      $profile->phoneNumber="19790609";
      $profile->user_id=7;
      $profile->save();

      factory(App\Profile::class, 7)->create();
    }
}
