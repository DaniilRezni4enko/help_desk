<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap/Autoloader.php';
class SettingController
{
    public function ShowSettingStr() {
        readfile($_SERVER['DOCUMENT_ROOT'] . '/resources/views/setting_views/start_auth.php');

    }

    public function Start_process() {
        $database = $_POST['database'];
        $hostname = $_POST['hostname'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        if (empty($_POST['password'])) {
            $password = "";
        }
        $connect = new BaseConnect();
        $connection = $connect->Connect($database, $hostname, $password, $name);
        if($connection) {
            file_put_contents('settings/setting.php', '<?php const DATABASE = ' . '"' . $database . '";');
            file_put_contents('settings/setting.php', 'const HOSTNAME = ' . '"' . $hostname . '";', FILE_APPEND);
            file_put_contents('settings/setting.php', 'const NAME = ' . '"' . $name . '";', FILE_APPEND);
            file_put_contents('settings/setting.php', 'const PASSWORD = ' . '"' . $password . '";', FILE_APPEND);
            $func = new BaseController();
            $func->StartCreateTable();
        }
        else {
            echo "<script>alert('Подключение к базе данных не удалось!')</script>";
            $url = $_SERVER['HTTP_HOST'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            header('Location: ' . $protocol . $url . '/Start');

        }


    }
}