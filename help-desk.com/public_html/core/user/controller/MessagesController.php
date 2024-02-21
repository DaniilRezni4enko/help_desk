<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
class MessagesController
{
    public function __construct() {
        $this->base = new BaseController();
    }

    public function ShowConcretNews($id) {
        $login = $this->base->ChekAuthorNews($id);
        $data = $this->base->SelectMessagesInfoFromShow($id);
        $fio = $this->base->ChekFIOFromLogin($login);
        $data['author'] = $fio;
        if(isset($_COOKIE['admin'])) {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/messages_str.php";
            ShowAdminMessagesStr($data);
            exit();
        }
        if($login == $_COOKIE['user']) {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/messages_str.php";
            ShowUserMessagesStr($data);
        }
    }

    public function ShowAllNews()
    {
        readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/main.php");
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/header_table.php";
        Show_header('Мои заявки', 'Все ваши заявки');
        $massive = explode(',', $this->base->ChekUserCountPosts());
        $count = count($massive);
        $iterate = 0;
        for ($i=0;$i<$count;$i++) {
            $arr = $this->base->SelectMessagesInfo($massive[$i], $_COOKIE['user']);
            $reason = $arr['reason'];
            $level = $arr['level'];
            $text = $arr['text'];
            $date = $arr['data'];
            if (strlen($text) > 8) {
                $text = substr($text, 0,14) . "...";
            }
            if (strlen($reason) > 8) {
                $reason = substr($reason, 0,14) . "...";
            }
            $mass = ['id' => $massive[$i], 'reason' => $reason, 'level' => $level, 'text' => $text, 'date' => $date];
            require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/table_str.php";
            if(strlen($reason) > 1) {
                $iterate++;
                Show_str($mass);
            }
        }
        if ($iterate < 4) {
            $mass = ['id' => '', 'reason' => '', 'level' => '', 'text' => '', 'date' => ''];
            for ($i=0; $i < 4-$iterate; $i++) {
                Show_str($mass);
            }
        }
    }

    public function DeleteMessages($id) {
        $result = $this->base->DeleteMessages($id);
        $url = $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        header("Location: " . $protocol . $url);

    }
}