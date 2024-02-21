<?php

class PostsController
{
    public function Get() {
        readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/new_posts.php");
    }

    public function SendPostsProcess() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
        $name = $_POST['post'];
        $base = new BaseController();
        $base->CreateNewPosts($name);
        if($base) {

            header("Location: http://help-desk.com/wp-admin");
        }
    }

}