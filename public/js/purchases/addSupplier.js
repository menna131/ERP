
var url =document.currentScript.getAttribute('url');
////////////////////////////////////////////////////////////////////////
function addSupplier() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            "Accept": "application/json"
        },
        method: "GET",
        url: url,
        data: {
            "name": $('input[name="name"]').val(),
            "nickname": $('input[name="nickname"]').val(),
            "phone": $('input[name="phone"]').val(),
            "address": $('input[name="address"]').val()
        },
        success: function(data) {
            if (data.success == 'true') {
                $(".supplier-error").map(function(index, currentValue) {
                    // console.log(index, currentValue['id']);
                    let idName = currentValue['id'];
                    $('div[id='+ idName +']').html('');
                });
                $("#store-supplier-message").html('');
                $("#store-supplier-message").html(data.message);
            }
        },
        error: function(data) {
            var response = $.parseJSON(data.responseText);
            $.each(response.errors, function(key, val) {
                console.log(key, val);
                $("#store-supplier-message").html('');
                $('div[id=' + key + '-error]').html('');
                $('div[id=' + key + '-error]').html(val[0]);
            });
        },
    });
};
