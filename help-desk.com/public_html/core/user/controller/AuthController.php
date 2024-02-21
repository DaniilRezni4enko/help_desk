<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap/Autoloader.php";
class AuthController
{
    public function __construct() {
        $this->base = new BaseController();
    }

    public function ChekCode() {
        $code =  $_POST['code'];
        $code_in_base = $this->base->ChekCode();
        if($code === $code_in_base['code']) {
            setcookie('code', 'true', time() + 3600 ** 90);
            header("Location: http://help-desk.com/Register");
        }
    }

    public function ShowRegisterForm() {
        if (isset($_COOKIE['code'])) {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/create_account.php";
        } else {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/chek_code.php";
        }

    }

    public function Register_Process() {
        $url = $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        $data = [
            'login' => $_POST['login'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'patronymic' => $_POST['patronymic'],
            'password' => md5($_POST['password']),
            'posts' => explode('/', $_POST['post'])[0]
        ];
        $ch = $this->base->ChekUserLogin($data['login']);
        if ($ch != null) {
           echo "<script>alert('Данный логин зарегистрирован в системе. Введите другой логин.')</script>";
           header("Location: " . $protocol . $url . '/Auth');
        }
        else {

            $result = $this->base->CreateUserAccount($data['login'], $data['name'], $data['surname'], $data['patronymic'], $data['password'], $data['posts']);
            if ($result) {
                setcookie('user', $data['login'], time() + 3600 * 90);
                header("Location: " . $protocol . $url);
            }
            else {
                echo "<script>alert('Что-то пошло не так.Повторите попытку позже.')</script>";
                header("Location: " . $protocol . $url . '/Auth');
            }
        }
    }
    public function ShowAuthForm() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/resources/views/user/user_auth.php';
    }

    public function Auth_Process() {
        $url = $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        $data = [
            'login' => $_POST['login'],
            'password' => md5($_POST['password'])
        ];
        $chek = $this->base->ChekUserLogin($data['login']);
        if ($chek == $data['password']) {
            setcookie('user', $data['login'], time() +3600 ** 9000);
            header("Location: http://help-desk.com/");
        }
        else {
            echo "<script>alert('Неверный логин или пароль!')</script>";
            header("Location: " . $protocol . $url . '/Auth');
        }
    }


    public function Logout() {
        setcookie('user', '', time() - 3600 ** 900000);
        header("Location: http://help-desk.com/");
    }
}