<?php

use Illuminate\Database\Seeder;

use App\User as UserEloquent;
use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;
use App\Comment as CommentEloquent;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = factory(UserEloquent::class, 4)->create();
    	$postTypes = factory(PostTypeEloquent::class,10)->create();
    	$posts = factory(PostEloquent::class,100)->create()->each(function($post) use ($users,$postTypes){
    		$post->type=$postTypes[mt_rand(0, (count($postTypes)-1))]->id;
    		$post->user_id=$users[mt_rand(0, (count($users)-1))]->id;
    		$post->save();
    	});
        $comments = factory(CommentEloquent::class,500)->create()->each(function($comment) use ($posts,$users){
            $comment->post_id=$posts[mt_rand(0, (count($posts)-1))]->id;
            $comment->user_id=$users[mt_rand(0, (count($users)-1))]->id;
            $comment->save();
        });
    }
}
