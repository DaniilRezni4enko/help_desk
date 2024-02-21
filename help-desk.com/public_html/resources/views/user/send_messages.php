<link href="/resources/css/send_messages.css" rel="stylesheet" type="text/css">
<div class="container d-flex justify-content-center align-items-center">

    <form method="POST" action="Sendmessage">
        <h1 class="title text-center mb-4">Создать заявку</h1>

        <!-- E-mail -->
        <div class="form-group position-relative">
            <label for="formEmail" class="d-block">
                <i class="icon" data-feather="mail"></i>
            </label>
            <input type="text" id="formEmail" name="reason" class="form-control form-control-lg thick reason" placeholder="Причина заявки">
        </div>

        <div class="form-group position-relative">
            <label for="formEmail" class="d-block">
                <i class="icon" data-feather="mail"></i>
            </label>
            <input type="text" id="formEmail" name="level" class="form-control form-control-lg thick level" placeholder="Уровень важности">
        </div>

        <!-- Message -->
        <div class="form-group message">
            <textarea id="formMessage" class="form-control form-control-lg text" name="text" rows="7" placeholder="Текст запроса"></textarea>
        </div>

        <!-- Submit btn -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary" tabIndex="-1">Send message</button>
        </div>
    </form>

</div>