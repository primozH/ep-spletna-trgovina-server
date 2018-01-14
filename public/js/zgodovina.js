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
});