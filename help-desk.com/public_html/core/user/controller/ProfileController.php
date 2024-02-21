<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
class ProfileController
{
    public function Get() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/profile.php";
        if(isset($_COOKIE['user'])) {
            $base = new BaseController();
            $data = $base->ChekProfileData();
            ShowProfile($data);
        }
        else {
            $url = $_SERVER['HTTP_HOST'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            header("Location: " . $protocol . $url , '/Auth');
        }

    }
}