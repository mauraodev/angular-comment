<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        Comment::create(array(
            'author' => 'Chris',
            'text' => 'Example'
        ));

        Comment::create(array(
            'author' => 'Mauro',
            'text' => 'Example'
        ));

        Comment::create(array(
            'author' => 'Example',
            'text' => 'Example'
        ));
    }
}
