function isContainsLetters(value) {
    return /.*[a-zA-Z].*/.test(value.toString());
}

function isContainsNumbers(value) {
    return /\d/.test(value.toString());
}

function register() {
    let isConfirmed = window.confirm("Вы действительно хотите зарегистрироваться?");
    if (!isConfirmed) {
        return;
    }
    validate(new FormData(document.querySelector('form')));
}

function clearForm() {
    document.getElementById('form').reset();
}

function validate(formData) {
    const login = formData.get('login');
    const password = formData.get('password');
    const email = formData.get('email');
    if (login.length < 7) {
        window.alert('Логин должен быть не менее 7 символов');
    } else if (!isContainsNumbers(login) || !isContainsLetters(login)) {
        window.alert('Логин должен содержать как буквы, так и цифры');
    } else if (email.indexOf('@') === -1) {
        window.alert('Неверный адрес электронной почты');
    } else if (password.length < 8) {
        window.alert('Пароль должен быть не менее 8 символов');
    } else if (!isContainsNumbers(password) || !isContainsLetters(password)) {
        window.alert('Пароль должен содержать как буквы, так и цифры');
    } else {
        clearForm();
        moveToVideoPage();
    }
}

function moveToDeveloperPage() {
    let result = window.prompt("Для выполнения запроса решите математическую задачу: Сколько будет 17 + 32");
    if (result !== 39) {
        window.alert("Задача решена неправильно.")
        return;
    }
    window.open('about-developer.html');
    window.close();
}

function moveToRegistrationPage() {
    window.open('main.html');
    window.close();
}

function moveToVideoPage() {
    window.open('video.html')
    window.close();
}

function showCurrentDate() {
    document.getElementById('currentDate').innerHTML = new Date().toLocaleString();
}

function hideCurrentDate() {
    document.getElementById('currentDate').innerHTML = 'Наведите, чтобы увидеть текущее время';
}
