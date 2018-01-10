$(document).ready(function() {

    $("#submit-btn").click(function(event) {
        var response = grecaptcha.getResponse();
        if (!response) {
            $("#no-captcha").show();
            event.preventDefault();
        }

    });

});

var onloadCallback = function() {
    var id = grecaptcha.render('captcha', {
        'sitekey' : '6LeaBEAUAAAAAAQS9_Z2aJkJsRvxa6MaotdP_st6',
        'callback' : function() {
            $("#submit-btn").show();
        }
    });
};