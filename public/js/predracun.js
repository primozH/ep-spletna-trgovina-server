$(document).ready(function() {

    $("#next").click(function(event) {
        $.post("/racuni", {}, function(response, status) {
            if (status === "success") {
                window.location = "/racuni";
            }
        })
    });
});