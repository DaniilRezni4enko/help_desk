<?php

class AdminController
{
    public function Get() {
        if(isset($_COOKIE['admin'])) {
            readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/items/admin_menu.php");
            require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/ShowMessageController.php";
            $views = new ShowMessageController();
            $views->Show_admin_str();
        }
        else {
            $url = $_SERVER['HTTP_HOST'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            header("Location: " . $protocol . $url . '/wp-admin/Auth');
        }
    }
}