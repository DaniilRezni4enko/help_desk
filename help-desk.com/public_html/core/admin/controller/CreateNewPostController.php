<?php

class CreateNewPostController
{
    public function ShowCreateAdminForm() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/create_new_posts.php";
    }
}