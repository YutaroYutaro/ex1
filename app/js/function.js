$('#createButton').on('click', function () {
    $('#success-alert').hide().html('');
    $('#update-error-alert').hide().html('');

    let fd = new FormData($('#createForm').get(0));

    $.ajax({
        type: 'POST',
        url: './app/php/create.php',
        data: fd,
        processData: false,
        contentType: false,
    })
        .done((data) => {
            console.log(data);
        })
        .fail(() => {
            console.log('create fail...');
        })
});

let updateId;

$('.updateButton').on('click', function () {
    $('#success-alert').hide().html('');
    $('#update-error-alert').hide().html('');

    updateId = $(this).parent().attr("id");
    let title = $('#' + updateId + ' .card-title').html();
    let comment = $('#' + updateId + ' .card-comment').html();

    $('#update-title').val(title);
    $('#update-comment').val(comment);
});

$('#modal-update-button').on('click', function () {
    let fd = new FormData($('#updateForm').get(0));
    fd.append('id', updateId);

    $.ajax({
        type: 'POST',
        url: './app/php/update.php',
        data: fd,
        processData: false,
        contentType: false,
    })
        .done((res) => {
            let data = JSON.parse(res);

            if (data['err'].length === 0) {
                $('#' + data['data']['id'] + ' .card-title').html(data['data']['title']);
                $('#' + data['data']['id'] + ' .card-comment').html(data['data']['comment']);
                $('#updateModal').modal('hide');

                let position = $('#success-alert').html('更新に成功しました．').show().offset().top;

                $('html, body').animate({
                    scrollTop : position
                }, {
                    queue : false
                });

            } else {
                let errorText = '';

                Object.keys(data['err']).forEach(function (key) {
                    errorText += (data['err'][key] + '<br>');
                });

                $('#update-error-alert').html(errorText).show();

                // console.log(data['err']);
            }

        })
        .fail(() => {
            $('#update-error-alert').html('通信に失敗しました．').show();
            // console.log('create fail...');
        })
});

let deleteId;

$('.deleteButton').on('click', function () {
    $('#success-alert').hide().html('');
    $('#update-error-alert').hide().html('');

    deleteId = $(this).parent().attr('id');
});

$('#modal-delete-button').on('click', function () {
    $.ajax({
        url: './app/php/delete.php',
        type: 'POST',
        data: {
            id: deleteId
        }
    })
        .done((data) => {
            console.log('ajax success: ' + data);
            $('#deleteModal').modal('hide');
            $('#' + deleteId).parent().remove();

        })
        .fail(() => {
            $('#delete-error-alert').html('通信に失敗しました．').show();
            // console.log('delete fail...');
        });
});
