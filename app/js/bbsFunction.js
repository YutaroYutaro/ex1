$('#createButton').on('click', function () {
    $('#success-alert').hide().html('');
    $('#update-error-alert').hide().html('');
    $('#create-error-alert').hide().html('');
    $('#delete-error-alert').hide().html('');

    let fd = new FormData($('#createForm').get(0));

    $.ajax({
        type: 'POST',
        url: './app/php/create.php',
        data: fd,
        processData: false,
        contentType: false,
    })
        .done((res) => {
            let data = JSON.parse(res);

            if (data['err'].length === 0) {
                $('#bbs-body').prepend(
                    '<div class="card mb-3">' +
                    '<div id="' + data['data']['id'] + '" data-user-id="' + data['data']['user_id'] + '" class="card-body">\n' +
                    '<h5 class="card-title">' + data['data']['title'] + '</h5>\n' +
                    '<p class="card-text card-comment">' + data['data']['comment'] + '</p>\n' +
                    '<p class="card-text">\n' +
                    '<small class="text-muted">' + data['data']['created_at'] + '</small>\n' +
                    '</p>\n' +
                    '<button type="button" class="btn btn-success updateButton" data-toggle="modal"\n' +
                    'data-target="#updateModal">修正する\n' +
                    '</button>\n' +
                    '<button type="button" class="btn btn-danger deleteButton" data-toggle="modal"\n' +
                    'data-target="#deleteModal">削除する\n' +
                    '</button>\n' +
                    '</div>' +
                    '</div>'
                );

                console.log(data['data']);
            } else {
                let errorText = '';

                Object.keys(data['err']).forEach(function (key) {
                    errorText += (data['err'][key] + '<br>');
                });

                $('#create-error-alert').html(errorText).show();
            }

            // console.log(data);
        })
        .fail(() => {
            $('#create-error-alert').html('通信に失敗しました．').show();
            // console.log('create fail...');
        })
});

let updateId;

$(document).on('click', '.updateButton', function () {
    $('#success-alert').hide().html('');
    $('#update-error-alert').hide().html('');
    $('#create-error-alert').hide().html('');
    $('#delete-error-alert').hide().html('');

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
                    scrollTop: position
                }, {
                    queue: false
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

$(document).on('click', '.deleteButton', function () {
    $('#success-alert').hide().html('');
    $('#update-error-alert').hide().html('');
    $('#create-error-alert').hide().html('');
    $('#delete-error-alert').hide().html('');

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
        .done((res) => {
            // console.log('ajax success: ' + data);
            let data = JSON.parse(res);

            if (data['err'].length === 0) {
                $('#deleteModal').modal('hide');
                $('#' + deleteId).parent().remove();

                let position = $('#success-alert').html('削除に成功しました．').show().offset().top;

                $('html, body').animate({
                    scrollTop: position
                }, {
                    queue: false
                });
            } else {
                let errorText = '';

                Object.keys(data['err']).forEach(function (key) {
                    errorText += (data['err'][key] + '<br>');
                });

                $('#delete-error-alert').html(errorText).show();

            }

        })
        .fail(() => {
            $('#delete-error-alert').html('通信に失敗しました．').show();
            // console.log('delete fail...');
        });
});
