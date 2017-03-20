$(function () {
    $(".viewDetail").click(function (event) {

        let id = $(this).data("lid");
        console.log(id);
        // get modal view
        $.get( "/" + id, function( data ) {

            $("#myModal").html(data).modal('show');
        });

    });
})
