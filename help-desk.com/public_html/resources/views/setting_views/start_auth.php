<link rel="stylesheet" type="text/css" href="/resources/css/start_auth.css">
<div class="login">
    <h1>Приветствуем в Help-Desk</h1>
    <form method="post" action="Start_process">
        <input type="text" name="hostname" placeholder="Имя хостинга" required="required" />
        <input type="text" name="name" placeholder="Имя пользователя" required="required" />
        <input type="text" name="database" placeholder="Имя базы данных" required="required" />
        <input type="password" name="password"  placeholder="Пароль"/>
        <button type="submit" class="btn btn-primary btn-block btn-large" id="enter">Создать</button>
    </form>
</div>