$('#SignUp').on('click', function () {
    $('#SignUpErrorAlert').hide().html('');

    let fd = new FormData($('#SignUpForm').get(0));

    $.ajax({
        type: 'POST',
        url: './app/php/signUp.php',
        data: fd,
        processData: false,
        contentType: false
    })
        .done((res) => {
            let data = JSON.parse(res);

            if (data['err'].length === 0) {
                location.href = './index.php';
                console.log(data);
            } else {
                let errorText = '';

                Object.keys(data['err']).forEach(function (key) {
                    errorText += (data['err'][key] + '<br>');
                });

                $('#SignUpErrorAlert').html(errorText).show();
            }

            console.log(data);
        })
        .fail(() => {
            // console.log('ajax fail...')
            $('#SignUpErrorAlert').html('通信に失敗しました．').show();
        });
});