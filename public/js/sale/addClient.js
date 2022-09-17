
var url =document.currentScript.getAttribute('url');
function addClient() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            "Accept": "application/json"
        },
        method: "GET",
        url: url,
        data: {
            "name": $('input[id="name-client"]').val(),
            "nickname": $('input[name="nickname"]').val(),
            "phone": $('input[name="phone"]').val(),
            "address": $('input[name="address"]').val()
        },
        success: function(data) {
            if (data.success == 'true') {
                $('select[name="client-name"]').html(data.options);
                $(".client-error").map(function(index, currentValue) {
                    let idName = currentValue['id'];
                    $('div[id='+ idName +']').html('');
                });
                $("#store-client-message").html('');
                $("#store-client-message").html(data.message);
            }
        },
        error: function(data) {
            var response = $.parseJSON(data.responseText);
            $.each(response.errors, function(key, val) {
                $("#store-client-message").html('');
                $('div[id=' + key + '-error]').html('');
                $('div[id=' + key + '-error]').html(val[0]);
            });
        },
    });
};
