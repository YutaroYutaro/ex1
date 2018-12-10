$(".updateButton").on('click', function () {
    let updateId = $(this).parent().attr("id");
    let title = $("#" + updateId + " .card-title").html();
    let comment = $("#" + updateId + " .card-comment").html();
    $("#update-title").val(title);
    $("#update-comment").val(comment);
    console.log(updateId);
    console.log(title);
    console.log(comment);
});

$(".deleteButton").on('click', function () {
    let deleteId = $(this).parent().attr("id");
    console.log(deleteId);
});
