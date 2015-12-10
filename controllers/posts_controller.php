<?php
  include_once 'controller.php';
  class PostsController extends controller{
    public function index() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      
      if (!isset($this->params[0]))
        return call('pages', 'error');
      $id = $this->params[0];
      // we use the given id to get the right post
      $post = Post::find($id);
      require_once('views/posts/show.php');
    }
  }
?>