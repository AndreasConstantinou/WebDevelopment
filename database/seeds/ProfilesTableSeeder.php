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
      $profile->date_of_birth="1979-06-09";
      $profile->user_id=1;
      $profile->save();

      factory(App\Profile::class, 2)->create();
    }
}
