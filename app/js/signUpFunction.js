$('#SignUp').on('click', function () {
    let fd = new FormData($('#SignUpForm').get(0));

    $.ajax({
        type: 'POST',
        url: './app/php/signUp.php',
        data: fd,
        processData: false,
        contentType: false
    })
        .done((res) => {
            location.href = './index.php';
            // console.log(res);
        })
        .fail(() => {
            console.log('ajax fail...')
        });
});