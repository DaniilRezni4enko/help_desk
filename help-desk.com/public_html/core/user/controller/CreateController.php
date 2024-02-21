<?php

class CreateController
{
    public function Get() {
        readfile($_SERVER['DOCUMENT_ROOT'] . "/resources/views/user/send_messages.php");
    }
}