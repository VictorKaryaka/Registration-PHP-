$(document).ready(function () {

    /**
     * Clear all forms
     */
    function clearForms() {
        $('#login').val('');
        $('#password').val('');
        $('#pass_again').val('');
        $('#phone').val('');
        $('#invite').val('');
        $('.form-control').prop('selectedIndex', 0);
    }

    $('#clear').click(function () {
        clearForms();
    });


    /**
     ***************************** Filtration of input characters *******************************
     */

    $('#login').keyup(function () {
        var regExp = /^[a-zA-Z\d]+$/;
        var login = $('#login').val();
        if (!regExp.test(login)) {
            $('#login').val(login.substring(0, login.length - 1));
        }
    });

    $('#password, #pass_again').keyup(function () {
        var regExp = /^[a-zA-Z]|\d$/;
        var password = $('#password').val();
        var pass_again = $('#pass_again').val();
        if (!regExp.test(password)) {
            $('#password').val(password.substring(0, password.length - 1));
        }
        if (!regExp.test(pass_again)) {
            $('#pass_again').val(pass_again.substring(0, pass_again.length - 1));
        }
    });

    $('#phone').keyup(function () {
        var regExp = /^[+()]|\d$/;
        var phone = $('#phone').val();
        if (!regExp.test(phone)) {
            $('#phone').val(phone.substring(0, phone.length - 1));
        }
    });

    $('#invite').keyup(function () {
        var regExp = /^\d+$/;
        var invite = $('#invite').val();
        if (!regExp.test(invite)) {
            $('#invite').val(invite.substring(0, invite.length - 1));
        }
    });


    /**
     * *************************** Autochange city and country***********************************
     */

    $('#country').change(function () {
        $('#city').val($('#country').val());
    });

    $('#city').change(function () {
        $('#country').val($('#city').val());
    });

    /**
     * *******************************************************************************************
     */

    $('#notice').hide();
    $('#notice').click(function () {
        $('#notice').hide();
    });

    $('#users').click(function () {
        $(location).attr('href', 'public/users.php');
    });

    $('#invites').click(function () {
        $(location).attr('href', 'public/invites.php');
    });

    $('#registration').click(function () {
        var valid = [isLoginValid(), isPasswordValid(), isPhoneValid(),
            isCheckedCountry(), isCheckedCity(), isInviteValid()];

        for (var i = 0; i < valid.length; i++) {
            if (valid[i] == false) return false;
        }
        $('#registration').prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: 'src/application/FormHandler.php',
            data: {
                login: $('#login').val(),
                password: $('#password').val(),
                phone: $('#phone').val(),
                country: $('#country option:selected').text(),
                city: $('#city option:selected').text(),
                invite: $('#invite').val()
            },
            success: function (data) {
                var response = $.parseJSON(data);

                $('#notice').show();
                $('#notice').text(response.notice);
            }
        }).always(function () {
            $('#registration').prop('disabled', false);
        });
    });
});