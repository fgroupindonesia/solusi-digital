
$(document).ready(function () {
    function generateCaptcha(length = 7) {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz123456789';
        let captcha = '';
        for (let i = 0; i < length; i++) {
            captcha += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return captcha;
    }

    let currentCaptcha = generateCaptcha();
    $('#captchaText').text(currentCaptcha);

    $('#refreshCaptcha').click(function () {
        currentCaptcha = generateCaptcha();
        $('#captchaText').text(currentCaptcha);
        $('#captchaInput').val('');
        $('#captchaError').hide();
        $('#reg-submit').prop('disabled', true);
    });

    function checkCaptchaAndCheckbox() {
        const captchaInput = $('#captchaInput').val().trim();
        const checkboxChecked = $('#checkbox2').is(':checked');
        const captchaValid = captchaInput === currentCaptcha;

        if (captchaValid) {
            $('#captchaError').hide();
        } else {
            $('#captchaError').show();
        }

        $('#reg-submit').prop('disabled', !(captchaValid && checkboxChecked));
    }

    $('#captchaInput').on('keyup', checkCaptchaAndCheckbox);
    $('#checkbox2').on('change', checkCaptchaAndCheckbox);

    // awalnya disable dulu tombol Register
    $('#reg-submit').prop('disabled', true);
});
