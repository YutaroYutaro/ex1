$('#SignIn').on('click', function () {
    $('#SignInErrorAlert').hide().html('');
    let fd = new FormData($('#SignInForm').get(0));

    $.ajax({
        type: 'POST',
        url: './app/php/signIn.php',
        data: fd,
        processData: false,
        contentType: false
    })
        .done((res) => {
            let data = JSON.parse(res);

            if (data['err'].length === 0) {
                location.href = './index.php';
            } else {
                let errorText = '';

                Object.keys(data['err']).forEach(function (key) {
                    errorText += (data['err'][key] + '<br>');
                });

                $('#SignInErrorAlert').html(errorText).show();
            }

            console.log(data);

        })
        .fail((res) => {
            $('#SignInErrorAlert').html('通信に失敗しました．').show();
        })
});
