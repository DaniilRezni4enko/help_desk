<link href="/resources/css/send_messages.css" rel="stylesheet" type="text/css">
<div class="container d-flex justify-content-center align-items-center">

    <form method="POST" action="SendPosts">
        <h1 class="title text-center mb-4">Название должности</h1>

        <!-- E-mail -->
        <div class="form-group position-relative">
            <label for="formEmail" class="d-block">
                <i class="icon" data-feather="mail"></i>
            </label>
            <input type="text" id="formEmail" name="post" class="form-control form-control-lg thick post" placeholder="Название должности">
        </div>
        <!-- Submit btn -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary" tabIndex="-1">Добавить</button>
        </div>
    </form>

</div>