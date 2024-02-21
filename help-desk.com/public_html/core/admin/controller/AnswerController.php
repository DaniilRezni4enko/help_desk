<?php

class AnswerController
{
    public function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
        $this->base = new BaseController();
    }
    public function ShowAnswerForm($id) {
        setcookie('last_answer', $id, time() +3600**90, '/wp-admin');
        readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/answer_to_messages.php");
    }

    public function AnswerProcess() {
        $data = [
            'autor' => $_COOKIE['admin'],
            'text' => $_POST['text'],
            'messages' => $_COOKIE['last_answer']
        ];
        setcookie('last_answer', '', time() - 3600 ** 900000);
        $this->base->CreateAnswer($data);
    }
    public function ShowAllAnswers() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/answer_table.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/items/admin_menu.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/answer_header_table.php";
        Show_answer_header('Ваши ответы на заявки', 'Ваши ответы на заявки:');
        $result = $this->base->Chek();
        for ($i = 0; $i < count($result); $i++) {
            $info = $this->base->ChekAnswerInfo($result[$i]);
            ShowAnswerTable($info);
        }
        if (count($result) < 4) {
            $mass = ['reason' => '', 'text' => '', 'id' => ''];
            for ($i=0; $i < 4-count($result); $i++) {
                ShowAnswerTable($mass);
            }
        }
    }
}