<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="/resources/css/start_auth.css">

<div class="login">
    <h1>Приветствуем в Help-Desk</h1>
    <form method="post" action="Auth_Process">
        <input type="text" name="login" class="log" placeholder="Логин"/>
        <input type="password" name="password" class="password" placeholder="Пароль" required="required"/>
        <button type="submit" class="btn btn-primary btn-block btn-large" id="enter">Войти</button>
        <h6>Нет аккаунт? <a href="Register">Зарегистироваться</a></h6>
<!--        <script src="/resources/js/user/auth.js"></script>-->
    </form>
</div>
