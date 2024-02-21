<?php


class ShowMessageController
{
    public function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/table_str.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/header_table.php";
        $this->base = new BaseController();
    }
    public function Show_user_str() {
        Show_header("Ваши заявки", "Ваши последние заявки");
        $max = $this->base->ChekUserCountPosts();
        $array = explode(',', $max);
        $count = 0;
        for ($i=0;$i<4;$i++) {
            $massive = $this->base->SelectMessagesInfo($array[$i], $_COOKIE['user']);
            $reason = $massive['reason'];
            $level = $massive['level'];
            $text = $massive['text'];
            if (strlen($text) > 8) {
                $text = substr($text, 0,14) . "...";
            }
            if (strlen($reason) > 8) {
                $reason = substr($reason, 0,14) . "...";
            }
            $date = $massive['data'];
            $id = substr($array[$i], 1);
            $mass = ['id' => $massive['id'], 'reason' => $reason, 'level' => $level, 'text' => $text, 'date' => $date];
            if(strlen($mass['reason']) > 1) {
                Show_str($mass);
                $count++;
            }
        }
        if ($count < 4) {
            $mass = ['id' => '', 'reason' => '', 'level' => '', 'text' => '', 'date' => ''];
            for ($i=0; $i < 4 - $count; $i++) {
                Show_str($mass);
            }
        }
    }

    public function Show_admin_str() {
        Show_header("Админ-панель", "Последние полученные заявки");

        require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
        $base = new BaseController();
        $min = $base->SelectIdNotAnswerNews(0);
        $count = 0;
        for($i = 1; $i <= 4; $i++) {
            $id = $base->SelectIdNotAnswerNews($min);
            $min = $id;
            $mass = $base->SelectMessagesToAdminInfo($id);
            $reason = $mass['reason'];
            if (strlen($reason) > 14) {
                $reason = substr($reason, 0, 8) . '...';
            }
            $level = $mass['level'];
            $text = $mass['text'];
            if (strlen($text) > 8) {
                $text = substr($text, 0, 8) . "...";
            }
            $date = $mass['data'];

            $mass = ['id' => $id, 'reason' => $reason, 'level' => $level, 'text' => $text, 'date' => $date];
            if(strlen($text) > 2) {
                Show_str($mass);
                $count++;
            }
        }
        if ($count < 4) {
            $mass = ['id' => '', 'reason' => '', 'level' => '', 'text' => '', 'date' => ''];
            for ($i=0; $i < 4 - $count; $i++) {
                Show_str($mass);
            }
        }
    }

    public function ShowAllMessagesAdmin() {
        echo '12';
    }
}