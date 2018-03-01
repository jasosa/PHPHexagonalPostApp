<?php

include(dirname(__FILE__)  . "/../../domain/Post/PostRepositoryInterface.php");

class PostRepository implements PostRepositoryInterface  
{
    public $posts = [];

    public function create(Post $post)
    {
        $this->posts[] = $post;

        // Obviously, this is for testing purposes only
        echo "Post with id {$post->id} was created.";
    }

    public function getPosts()
    {
		return $this->posts;
    }
}