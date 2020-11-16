
// LOGIN

$(function() {
    $('#loginForm').submit(function(e){ 
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'login', 
                action: 'login',
                k_adi: $('#k_adi').val(),
                sifre: $('#sifre').val(),
            },
            dataType: 'json',
            success: function(data) {

                if(data.k_id) {
                    $('#k_adi').val('');
                    $('#sifre').val('');
                    location = "index.php";
                }
                else {
                    $("#error").html(data);
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');
                }
            },
        });
    });
});