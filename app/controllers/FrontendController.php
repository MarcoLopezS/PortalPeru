<?php

use PortalPeru\Entities\Post;
use PortalPeru\Repositories\PostRepo;

class FrontendController extends BaseController{

    private $postRepo;

    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }
    
    public function home()
    {
        $post_1 = Post::where('post_order_id', '=', 1)->orderBy('published_at','desc')->paginate(4);
        $post_2 = Post::where('post_order_id', '=', 2)->orderBy('published_at','desc')->paginate(1);
        $post_3 = Post::where('post_order_id', '=', 3)->orderBy('published_at','desc')->paginate(1);
        $post_4 = Post::where('post_order_id', '=', 4)->orderBy('published_at','desc')->paginate(1);
        $post_5 = Post::where('post_order_id', '=', 5)->orderBy('published_at','desc')->paginate(1);
        $post_6 = Post::where('post_order_id', '=', 6)->orderBy('published_at','desc')->paginate(1);
        $post_7 = Post::where('post_order_id', '=', 7)->orderBy('published_at','desc')->paginate(1);
        $post_8 = Post::where('post_order_id', '=', 8)->orderBy('published_at','desc')->paginate(1);
        return View::make('frontend.home-1', compact('post_1', 'post_2', 'post_3', 'post_4', 'post_5', 'post_6', 'post_7', 'post_8'));
    }

} 