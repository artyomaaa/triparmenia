

$(document).ready(function () {

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery('#admin_login').click(function (e) {

        e.preventDefault();
        var form = new FormData($('#admin_login_form')[0]);
        jQuery.ajax({
            url: "/login-admin",
            data: form,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                window.location.href = '/admin/dashboard/';
            },
            error: function (response) {
                window.location.href = '/abort';
                // let errors = JSON.parse(response.responseText);
                // jQuery.each(errors.body, function (key, value) {
                //     console.log(key, value);
                //     jQuery('.' + key + '-error').text(value[0]);
                // });

            },
        })
    });
});
