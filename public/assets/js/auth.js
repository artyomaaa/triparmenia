$(document).ready(function () {

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    jQuery('.error').empty();
    jQuery('.btn_signup').click(function (e) {
        e.preventDefault();
        var formData = new FormData($('#reg_form')[0]);
        //var  formData = $('#reg_form').serialize();
        jQuery('.error').empty();
        jQuery.ajax({
            url: "/register-account",
            data: formData,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                window.location.href = '/';
            },

            error: function (response) {
                let errors = JSON.parse(response.responseText);
                jQuery.each(errors.body, function (key, value) {
                    console.log(key, value);
                    jQuery('.' + key + '-error').text(value[0]);
                });

            },
        })
    });
    $("input").blur(function(){
        jQuery('.error').empty();
    });

    jQuery('.btn_sign-in').click(function (e) {
        e.preventDefault();
         var form = new FormData($('#modal_login_forms')[0]);

        // var form = $('#modal_login_forms').serialize();
        // var password = $('#password_modal').val();
        //  var email = $(' #email').val();
        jQuery.ajax({
            url: "/login",
            data: form,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                 window.location.href = '/my-account';
            },
            error: function (response) {
                let errors = JSON.parse(response.responseText);
                jQuery.each(errors.body, function (key, value) {
                    console.log(key, value);
                    jQuery('.' + key + '-error').text(value[0]);
                });

            },
        })
    });


    jQuery('#service').click(function (e) {
        e.preventDefault();
        var data = new FormData($('#reg_form_service')[0]);

        // var form = $('#modal_login_forms').serialize();
        // var password = $('#password_modal').val();
        //  var email = $(' #email').val();
        jQuery.ajax({
            url: "/services_add",
            data: data,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                 window.location.href = '/my-account';
            },
            error: function (response) {
                let errors = JSON.parse(response.responseText);
                jQuery.each(errors.body, function (key, value) {
                    console.log(key, value);
                    jQuery('.' + key + '-error').text(value[0]);
                });

            },
        })
    });


    jQuery('#service_image_button').click(function (e) {

        e.preventDefault();
        var Image= new FormData($('#seervice_image_upload')[0]);
        //var  formData = $('#register_form').serialize();
        jQuery('.error').empty();
        jQuery.ajax({
            url: "service/image",
            data: Image,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                console.log(response);
                window.location.href = '/my-account';


            },

            error: function (response) {
                let errors = JSON.parse(response.responseText);
                jQuery.each(errors.body, function (key, value) {
                    console.log(key, value);
                    jQuery('.' + key + '-error').text(value[0]);
                });

            },
        })
    });


    jQuery('#check_pass_btn').click(function (e) {
        e.preventDefault();
        var check= new FormData($('#check_pass')[0]);
        jQuery.ajax({
            url: '/check-email',
            data: check,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                console.log(response);
                window.location.href = '/';
            },

            error: function (response) {
                let errors = JSON.parse(response.responseText);
                jQuery.each(errors.body, function (key, value) {
                    console.log(key, value);
                    jQuery('.' + key + '-error').text(value[0]);
                });

            },
        })
    });

    jQuery('#reset_pass_btn').click(function (e) {
        e.preventDefault();

        var check= new FormData($('#reset_pass')[0]);
        jQuery.ajax({
            url: '/reset-password',
            data: check,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            datatype: "json",
            success: function (response) {
                console.log(response);
                // window.location.href = '/';
            },

            error: function (response) {
                let errors = JSON.parse(response.responseText);
                jQuery.each(errors.body, function (key, value) {
                    console.log(key, value);
                    jQuery('.' + key + '-error').text(value[0]);
                });

            },
        })
    });


});

