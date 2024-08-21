jQuery(document).ready(function () {
    wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 100, // default
        mobile: true, // default
        live: true        // default
    });
    wow.init();
    AOS.init();

    jQuery('a.language').on('click', function () {
        var lang = $(this).data('lg');
        $.post('/changelanguage.html', {'lang': lang}, function (data) {
            location.reload();
        });
    });


    jQuery('#change-video').on('change', function () {
        var videoID = $(this).val();
        $("#current-video").attr("src", "https://www.youtube.com/embed/" + videoID + "?controls=1&amp;autoplay=0&amp;showinfo=0&amp;start=0&amp;loop=0&amp;modestbranding=1&amp;hl=vi&amp;enablejsapi=1&amp");
    });

    jQuery('#menu').mmenu();

    jQuery('._autoplay').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    jQuery('._slick2').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });

    jQuery('._slick3').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
    jQuery('._slick6').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            }
        ]
    });
    jQuery('._autoplayspkm').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 639,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
    jQuery('._btn-mn-dm').on('click', function () {
        jQuery(this).closest('._bgdm').find('._menu-child').slideToggle('show');
        return false;
    });
    var menu = $('._bgheader');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            menu.addClass('menu-fix');
        } else {
            menu.removeClass('menu-fix');
        }
    });

    jQuery("._scrollvert").simplyScroll({
        customClass: 'vert',
        orientation: 'vertical',
        auto: true,
        manualMode: 'loop',
        frameRate: 20,
        speed: 1
    });

    $("#fox").on('click', function (e) {
        //#testimonials-captcha-image is my captcha image id
        $("img[id$='-verifycode-image']").trigger('click');
        e.preventDefault();
    });

    jQuery(function ($) {
        $('img.lazy').lazyload({"failurelimit": 20, "effect": "fadeIn"});
    });
    
    $('#senddhbs').on('click', function () {
        var namedhbs = $('#namedhbs').val();
        var phonedhbs = $('#phonedhbs').val();
        var emaildhbs = $('#emaildhbs').val();
        var bacsidh = $('#bacsidh').val();
        var chinhanhdh = $('#chinhanhdh').val();
        var timedhbs = $('#timedhbs').val();
        var noidungdhbs = $('#noidungdhbs').val();
        if (namedhbs != '' && phonedhbs != '' && emaildhbs != '' && bacsidh != '' && chinhanhdh != '' && timedhbs != '') {
            if (isValidEmailAddress(emaildhbs)) {
                sendDathen(namedhbs, phonedhbs, emaildhbs, bacsidh, chinhanhdh, timedhbs, noidungdhbs);
                return false;
            } else {
                bootbox.alert('Email không hợp lệ');
                $('#emaildhbs').focus();
                return false;
            }
        }
        if (namedhbs == '') {
            bootbox.alert('Vui lòng nhập Họ và tên');
            $('#namedhbs').focus();
            return false;
        }
        if (phonedhbs == '') {
            bootbox.alert('Vui lòng nhập Số điện thoại');
            $('#phonedhbs').focus();
            return false;
        }
        if (emaildhbs == '') {
            bootbox.alert('Vui lòng nhập Email');
            $('#emaildhbs').focus();
            return false;
        }
        if (chinhanhdh == '') {
            bootbox.alert('Vui lòng chọn Chi nhánh');
            $('#chinhanhdh').focus();
            return false;
        }
        if (bacsidh == '') {
            bootbox.alert('Vui lòng chọn Bác sĩ');
            $('#bacsidh').focus();
            return false;
        }
        if (timedhbs == '') {
            bootbox.alert('Vui lòng chọn Thời gian');
            return false;
        }
    });

    $('#senddk').on('click', function () {
        var namedk = $('#namedk').val();
        var phonedk = $('#phonedk').val();
        var emaildk = $('#emaildk').val();
        var chinhanhdk = $('#chinhanhdk').val();
        var timedk = $('#timedk').val();
        var noidungdk = $('#noidungdk').val();
        if (namedk != '' && phonedk != '' && emaildk != '' && chinhanhdk != '' && timedk != '') {
            if (isValidEmailAddress(emaildk)) {
                emailNewsLetter(namedk, phonedk, emaildk, chinhanhdk, timedk, noidungdk);
                return false;
            } else {
                bootbox.alert('Email không hợp lệ');
                $('#namedk').focus();
                return false;
            }
        }
        if (namedk == '') {
            bootbox.alert('Vui lòng nhập Họ và tên');
            $('#namedk').focus();
            return false;
        }
        if (phonedk == '') {
            bootbox.alert('Vui lòng nhập Số điện thoại');
            $('#phonedk').focus();
            return false;
        }
        if (emaildk == '') {
            bootbox.alert('Vui lòng nhập Email');
            $('#emaildk').focus();
            return false;
        }
        if (chinhanhdk == '') {
            bootbox.alert('Vui lòng chọn Chi nhánh');
            $('#addressdk').focus();
            return false;
        }
        if (timedk == '') {
            bootbox.alert('Vui lòng chọn Thời gian');
            return false;
        }
    });

});

function sendDathen(namedhbs, phonedhbs, emaildhbs, bacsidh, chinhanhdh, timedhbs, noidungdhbs) {
    $.ajax({
        url: '/site/dangkyhen.html',
        type: 'POST',
        data: {
            namedhbs: namedhbs,
            phonedhbs: phonedhbs,
            emaildhbs: emaildhbs,
            bacsidh: bacsidh,
            chinhanhdh: chinhanhdh,
            timedhbs: timedhbs,
            noidungdhbs: noidungdhbs,
        }
    }).done(function (data) {
        if (data == 1) {
            bootbox.alert({
                message: 'Chúng tôi đã nhận được thông tin từ Quý Khách. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.',
                callback: function () {
                    $('#frmdhbs').trigger('reset');
                    $('#myModal-dhbs').modal('hide');
                }
            });
        } else {
            bootbox.alert('Có lỗi xảy ra. Vui lòng thử lại');
        }
    });
}

function emailNewsLetter(namedk, phonedk, emaildk, chinhanhdk, timedk, noidungdk) {
    $.ajax({
        url: '/site/dangky.html',
        type: 'POST',
        data: {
            namedk: namedk,
            phonedk: phonedk,
            emaildk: emaildk,
            chinhanhdk: chinhanhdk,
            timedk: timedk,
            noidungdk: noidungdk,
        }
    }).done(function (data) {
        if (data == 1) {
            bootbox.alert({
                message: 'Chúng tôi đã nhận được thông tin từ Quý Khách. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.',
                callback: function () {
                    $('#frmdknt').trigger('reset');
                    $('#frmdh').trigger('reset');
                    $('#myModal-dh').modal('hide');
                }
            });
        } else {
            bootbox.alert('Có lỗi xảy ra. Vui lòng thử lại');
        }
    });
}

function buyNow(id, qty) {
    var url = '/cart/buynow.html';
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id: id,
            qty: qty
        }
    });
}

function buyNow_Qty(id) {
    var qty = $('#qty').val();
    var url = '/cart/buynow.html';
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id: id,
            qty: qty
        }
    });
}

function addCart_Qty(id) {
    var qty = $('#qty').val();
    var url = '/cart/addcart.html';
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id: id,
            qty: qty
        }
    });
}

$(document).on('click', '.bootstrap-touchspin-down', function () {
    var value = parseInt($('#qty').val());
    value = value - 1;
    if (value <= 0)
        return false;
    $('#qty').val(value);
    return false;
})
$(document).on('click', '.bootstrap-touchspin-up', function () {
    var value = parseInt($('#qty').val());
    value = value + 1;
    if (value <= 0)
        return false;
    $('#qty').val(value);
    return false;
})

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

function showDv(id) {
    var url = '/site/showdv.html';
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id: id,
        }
    }).done(function (data) {
        $('#_result').empty().html(data);
    });
}