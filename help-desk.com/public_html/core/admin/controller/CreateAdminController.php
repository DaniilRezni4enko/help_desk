<?php

class CreateAdminController
{
    public function ShowCreateForm()
    {
        readfile($_SERVER['DOCUMENT_ROOT'] . '/resources/views/admin/create_admin.php');
    }

    public function CreateAdminProcess() {
        $data = [
            'login' => $_POST['login'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        echo 'aaaa';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/core/base/controller/BaseController.php';
        $base = new BaseController();
        $result = $base->CreateAdmin($data['login'], $data['email'], $data['password']);
        $id_admin = $base->ChekCountAdmin();
        if($result) {
            $subject = 'Поздравляем с авторизацией в Help-Desk!!!';
            $message = "Поздравляем вас с авторизацией в Help Desk в качестве администратора.\r\n Код для авторизации пользователей: " . $_COOKIE['code'] . " Выдайте данный код всем пользователям. Он необходим для авторизации в системе Help-Desk";
            echo "<script>alert('Поздравляем с авторизацией в Help-Desk. Вам на почту отправлен код, который вы должны выдать пользователям для авторизации.')</script>";
            if ($id_admin > 1) {
                $message = "Поздравляем вас с авторизацией в Help Desk в качестве администратора. Вы будете обрабатывать поступающие от пользователей. Уведомления о запросе будут поступать вам на почту, указанную вашем профиле.";
            }
            mail($data['email'], $subject, $message);
            setcookie('admin', $data['login'], time() +3600 ** 90);
            $url = $_SERVER['HTTP_HOST'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }$url = $_SERVER['HTTP_HOST'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            header("Location: " . $protocol . $url . '/wp-admin');
        }
        if(!$result) {
            echo "<script>alert('Что то пошло не так. Повторите попытку позже.')</script>";
        }
    }
}