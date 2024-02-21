<?php

class AnswersController
{
    public function __construct() {

        $this->base = new BaseController();
    }
    public function Get() {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/main.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/answer_table.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/base/items/answer_header_table.php";
        Show_answer_header('Ответы на ваши заявки', 'Ответы на ваши заявки:');
        $count = $this->base->ChekUserCountPosts();
        $mass = explode(',', $count);
        $count = count($mass);
        for ($i = 0; $i<$count-1; $i++) {
            $chek_answer = $this->base->ChekAnswerNews($mass[$i]);
            if($chek_answer == "Yes") {
                $massive = $this->base->SelectAnswerData($mass[$i]);
                if (strlen($massive[0]) > 20) {
                    $massive[0] = substr($massive[0], 0, 20);
                }
                if (strlen($massive[1]) > 20) {
                    $massive[1] = substr($massive[1], 0, 20) . '...';
                }
                ShowAnswerTable($massive);

            }
        }
        if ($count < 4) {
            $mass = ['text' => '', 'reason' => '', 'id' => ''];
            for ($i=0; $i < 5-$count;$i++) {
                ShowAnswerTable($mass);
            }
        }
    }
    public function ShowConcretAnswer($id) {
        $massive = $this->base->SelectAnswerData($id);
        $fio = $this->base->SelectFIOByAnswer($id);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/resources/views/user/answer_str.php';
        ShowUserAnswersStr($massive, $fio);
    }
}