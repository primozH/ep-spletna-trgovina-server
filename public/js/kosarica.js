$(document).ready(function() {
    var calculateSum = function() {
        $.get("/kosarica/vsebina", function(response, status) {
            if (status == "success") {
                sum = 0;
                response.items.forEach(function (element) {
                    sum += parseInt(element.cena) * parseInt(element.kolicina);
                });

                $("#price").text(sum);
            }
        })
    };

    calculateSum();

    $("input").change(function(event) {
        var id = $(this).parent().parent().attr("id");
        id = parseInt(id);
        var kolicina = $(this).val();

        $.post("/kosarica", {"id_produkt": id, "kolicina": kolicina}, function(response, status) {
            if (status === "success") {
                sum = 0;
                response.items.forEach(function (element) {
                    var t = parseInt(element.cena) * parseInt(element.kolicina);
                    if (element.id_produkt == parseInt(id)) {
                        var e = $(this).siblings().text();
                        console.log(e);
                    }
                    sum += t;
                });
                $("#price").text(sum);
            }
        })
    });

    $(".cancel").click(function(event) {
        var id = $(this).parent().parent().attr("id");
        var url = "/kosarica/" + id;
        $.get(url, function (response, status) {
            if (status === "nocontent") {
                $("#" + id).parent().remove();
                calculateSum();
            }
        } )
    });


});