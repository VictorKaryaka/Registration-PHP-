function isLoginValid() {
    var regExpSymb = /[0-9a-zA-Z]/;
    var regExpRange = /^[0-9a-zA-Z]{5,20}$/;

    if (!regExpSymb.test($('#login').val())) {
        $('#login').notify('Допускаются большие и маленькие буквы латинского алфавита, цифры от 0 до 9',
            {position: "right"}, 'error');
        return false;
    }

    if (!regExpRange.test($('#login').val())) {
        $('#login').notify('Логин должен содержать от 5 до 20 символов', {position: "right"}, 'error');
        return false;
    }

    return true;
}

function isPasswordValid() {
    var regExpSymb = /[0-9a-zA-Z]/;
    var regExpRange = /^[0-9a-zA-Z]{5,20}$/;

    if (!regExpSymb.test($('#password').val())) {
        $('#password').notify('Допускаются большие и маленькие буквы латинского алфавита, цифры от 0 до 9',
            {position: "right"}, 'error');
        return false;
    }

    if (!regExpRange.test($('#password').val())) {
        $('#password').notify('Пароль должен содержать от 5 до 20 символов', {position: "right"}, 'error');
        return false;
    }

    if ($('#password').val() && $('#password').val() != $('#pass_again').val()) {
        $('#pass_again').notify('Пароли должны совпадать', {position: "right"}, 'error');
        return false;
    }

    return true;
}

function isPhoneValid() {
    //format (093) 937 99 92
    var regExp1 = /^\([0-9]{3}\)\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;

    //format 093 937 99 92
    var regExp2 = /^[0-9]{3}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/;

    //format +38 (093) 937-99-92
    var regExp3 = /^\+38\s\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}$/;

    if (regExp1.test($('#phone').val())) {
        return true;
    } else if (regExp2.test($('#phone').val())) {
        return true;
    }
    else if (regExp3.test($('#phone').val())) {
        return true;
    } else {
        $('#phone').notify('Телефон можно вводить в формате +38 (050) 111-22-33, ' +
            '050 111 22 33, (050) 111 22 33', {position: "right"}, 'error');
        return false;
    }
}

function isCheckedCountry() {
    if ($('#country option:selected').text() == 'Выберите страну') {
        $('#country').notify('Выберите страну', {position: "right"}, 'error');
        return false;
    }
    return true;
}

function isCheckedCity() {
    if ($('#city option:selected').text() == 'Выберите город') {
        $('#city').notify('Выберите город', {position: "right"}, 'error');
        return false;
    }
    return true;
}

function isInviteValid() {
    var regExp = /^\d{6}$/;

    if (regExp.test($('#invite').val())) {
        return true;
    } else {
        $('#invite').notify('Инвайт должен состоять из 6 цифр', {position: "right"}, 'error');
    }
}
