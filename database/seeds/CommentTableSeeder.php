<?php
use App\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $comment = new Comment;
      $comment->comment="hello";
      $comment->user_id=1;
      $comment->save();

      factory(App\Comment::class, 20)->create();

    }
}
