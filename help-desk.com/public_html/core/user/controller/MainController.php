<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap/Autoloader.php';
class MainController
{

    public function Get() {
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/settings/setting.php")) {
            if(isset($_COOKIE['user'])) {
                readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/main.php");
                $view = new ShowMessageController();
                $view->Show_user_str();
            }
            else {
                if(isset($_COOKIE['user'])) {
                }
                else {
                    $url = $_SERVER['HTTP_HOST'];
                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                        $protocol = 'https://';
                    } else {
                        $protocol = 'http://';
                    }
                    header("Location: " . $protocol . $url . '/Auth');
                }
            }
        }
        else {
            $start = new SettingController();
            $start->ShowSettingStr();
        }
    }
}