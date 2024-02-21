<?php

class ShowMessagesStrController
{

    public function ShowAllMessagesAdmin() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap/Autoloader.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/table_str.php";
        readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/items/admin_menu.php");
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/header_table.php";
        Show_header('Все полученные заявки', 'Все полученные заявки');
        $base = new BaseController();
        $count = $base->ChekCountPosts()[0]+1;
        $iterate = 0;
        for($i=1;$i<$count;$i++) {
            $result = $base->SelectMessagesToAdminInfo($i);
            $reason = $result['reason'];
            $level = $result['level'];
            $text = $result['text'];
            if (strlen($text) > 8) {
                $text = substr($text, 0,14) . "...";
            }
            if (strlen($reason) > 8) {
                $reason = substr($reason, 0,14) . "...";
            }
            $date = $result['data'];
            $id = substr($result[$i], 1);
            $mass = ['id' => $i, 'reason' => $reason, 'level' => $level, 'text' => $text, 'date' => $date];
            if (strlen($mass['reason']) >= 1) {
                Show_str($mass);
                $iterate++;
            }
        }
        if ($iterate < 4) {
            $mass = ['id' => '', 'reason' => '', 'level' => '', 'text' => '', 'date' => ''];
            for ($i=0;$i < 4-$iterate; $i++) {
                Show_str($mass);
            }
        }

    }
}