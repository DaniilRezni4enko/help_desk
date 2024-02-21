<?php

class AuthAdminController
{
    public function ShowAuthAdminForm() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/auth.php";
    }

    public function AuthProcess() {
        $data = [
            'login' => $_POST['login'],
            'password' => $_POST['password']
        ];
        require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
        $base = new BaseController();
        $result = $base->ChekAdmin($data['login'], $data['password']);
        if($result) {
            session_start();
            $subject = 'Поздравляем с авторизацией в Help-Desk!!!';
            $message = "Поздравляем вас с авторизацией в Help Desk в качестве администратора.\r\n" . " Вы будете получать и отвечать на запросы пользователей, уведомления о поступлении которых, будут приходить вам на почту.";
            mail($data['email'], $subject, $message);
            setcookie('admin', $data['login'], time() + 3600 ** 900, '/');
            $url = $_SERVER['HTTP_HOST'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            header("Location: " . $protocol . $url . '/wp-admin');
        }
        else {
            echo "<script>alert('Что то пошло не так. Повторите попытку позже.')</script>";
        }

    }

    public function Logout() {
        setcookie('admin', '', time() -3600**900000, '/');
        $url = $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        header("Location: " . $protocol . $url);
    }
}