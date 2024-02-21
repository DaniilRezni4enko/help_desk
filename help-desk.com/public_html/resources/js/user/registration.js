document.getElementById('enter').onclick = UserRegister;

function UserRegister() {
    let url = document.location.href
    let danger_symbol = ['/', ':', '"', "'", '\\'];
    let login = document.querySelector('.log').value;
    let name = document.querySelector('.name').value;
    let surname = document.querySelector('.surname').value;
    let patronymic = document.querySelector('.patronymic').value;
    let password = document.querySelector('.password').value;
    for (let i = 0; i < Object.keys(danger_symbol).length; i++) {
        if (login.includes(danger_symbol[i])) {
            alert('Логин содержит недопустимый символ: ' + danger_symbol[i].toString());
            document.write(document.location.href);
            document.location.href = url;
        }
        if (name.includes(danger_symbol[i])) {
            alert('Поле Имя содержит недопустимый символ: ' + danger_symbol[i]);
            document.write(document.location.href);
            document.location.href = url;
        }
        if (surname.includes(danger_symbol[i])) {
            alert('Поле Фамилия содержит недопустимый символ: ' + danger_symbol[i]);
            document.write(document.location.href);
        }
        if (patronymic.includes(danger_symbol[i])) {
            alert('Поле Отчество содержит недопустимый символ: ' + danger_symbol[i]);
            document.write(document.location.href);
        }
        if (password.includes(danger_symbol[i])) {
            alert('Пароль содержит недопустимый символ: ' + danger_symbol[i]);
            document.write(document.location.href);
            document.location.href = url;
        }
    }
}