$(document).ready(function() {

    $(".clickable").click(function(event) {
        var id = $(this).parent().attr("id");

        window.location = "/izdelki/" + id;
    })

    $(".add-to-cart").click(function(event) {
        var id = $(this).parent().attr("id");

        $.post("/izdelki", {"id": id}, function(response) {

        })
    })
});