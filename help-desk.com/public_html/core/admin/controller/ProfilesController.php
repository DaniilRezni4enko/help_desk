<?php

class ProfilesController
{
public function Get() {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/resources/views/admin/profile.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/core/base/controller/BaseController.php";
    $base = new BaseController();
    $data = $base->ChekProfileAdminData();
    ShowProfile($data);

}
}