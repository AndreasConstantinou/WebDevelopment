<?php
use App\Post;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $post = new Post;
      $post->post="Hello World";
      $post->user_id=1;
      $post->save();

      $post = new Post;
      $post->post="How are you";
      $post->user_id=1;
      $post->save();

      factory(App\Post::class, 2)->create();
    }
}
