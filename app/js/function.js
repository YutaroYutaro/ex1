$('#createButton').on('click', function () {
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

$('.updateButton').on('click', function () {
    let updateId = $(this).parent().attr("id");
    let title = $('#' + updateId + ' .card-title').html();
    let comment = $('#' + updateId + ' .card-comment').html();
    $('#update-title').val(title);
    $('#update-comment').val(comment);

    $('#modal-update-button').on('click', function () {
        $('#modal-update-button').off('click');
    })
});

$('.deleteButton').on('click', function () {
    let deleteId = $(this).parent().attr('id');

    $('#modal-delete-button').on('click', function () {
        // console.log(deleteId);
        $('#modal-delete-button').off('click');
        $('#deleteModal').modal('hide');

        $.ajax({
            url: './app/php/delete.php',
            type: 'POST',
            data: {
                id: deleteId
            }
        })
            .done((data) => {
                console.log('ajax success: ' + data);
                $('#' + deleteId).parent().remove();

            })
            .fail((data) => {
                console.log('delete fail...');
            });
    });
});
