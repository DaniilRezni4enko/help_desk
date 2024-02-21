<?php

class SendmessageController
{
    public function Get() {
        $data = [
            'reason' => $_POST['reason'],
            'level' => $_POST['level'],
            'text' => $_POST['text'],
            'date' => date("d.m.y H:i"),
            'author' => $_COOKIE['user']
        ];
        require_once $_SERVER['DOCUMENT_ROOT'] . '/core/base/controller/BaseController.php';
        $base = new BaseController();
        $id = $base->CreateNewMessages($data);
        $url = $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        header('Location: ' . $protocol . $url . "/Messages/$id");
    }
}