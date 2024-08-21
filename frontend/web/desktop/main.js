jQuery(document).ready(function () {
    Layout.initOWL();
    wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // default
        offset: 100, // default
        mobile: true, // default
        live: true        // default
    });
    wow.init();
    AOS.init();

    jQuery(document).ready(function () {
        var url = window.location.pathname;
        $('.menuMain a[href="' + url + '"]').each(function () {
            $(this).addClass('current');
        });
    });

    jQuery('a.language').on('click', function () {
        var lang = $(this).data('lg');
        $.post('/changelanguage.html', {'lang': lang}, function (data) {
            location.reload();
        });
    });

    var t = {delay: 125, overlay: jQuery(".fb-overlay"), widget: jQuery(".fb-widget"), button: jQuery(".fb-button")};
    setTimeout(function () {
        jQuery("div.fb-livechat").fadeIn()
    }, 8 * t.delay), jQuery(".ctrlq").on("click", function (e) {
        e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function () {
            jQuery(this).hide("slow"), t.button.show()
        })) : t.button.fadeOut("medium", function () {
            t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)
        });
    });

    jQuery('#change-video a').on('click', function () {
        var videoID = $(this).attr('data-videoId');
        $("#current-video").attr("src", "https://www.youtube.com/embed/" + videoID + "?controls=1&amp;autoplay=0&amp;showinfo=0&amp;start=0&amp;loop=0&amp;modestbranding=1&amp;hl=vi&amp;enablejsapi=1&amp");
    });

    var menu = $('._banner');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0) {
            menu.addClass('menu-fix');
          
        } else {
            menu.removeClass('menu-fix');
           
         
        }
    });

    var btn = $('#back-top');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, '300');
    });

    jQuery("._scrollvert").simplyScroll({
        customClass: 'vert',
        orientation: 'vertical',
        auto: true,
        manualMode: 'loop',
        frameRate: 20,
        speed: 1
    });

    jQuery("._scrollvert2").simplyScroll({
        customClass: 'vert2',
        orientation: 'vertical',
        auto: true,
        manualMode: 'loop',
        frameRate: 20,
        speed: 1
    });

    $('#my-affix').affix({
        offset: {
            top: 210
            , bottom: function () {
                return (this.bottom = $('._foot').outerHeight(true) + 54);
            }
        }
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
    
     $('#senddh').on('click', function () {
        var namedh = $('#namedh').val();
        var phonedh = $('#phonedh').val();
        var emaildh = $('#emaildh').val();
//        var phongkhamdh = $('#phongkhamdh').val();
        var timedh = $('#timedh').val();
        var noidungdh = $('#noidungdh').val();
        if (namedh != '' && phonedh != '' && emaildh != '' && timedh != '') {
            if (isValidEmailAddress(emaildh)) {
                emailNewsLetter(namedh, phonedh, emaildh, timedh, noidungdh);
                return false;
            } else {
                bootbox.alert('Email không hợp lệ');
                $('#emaildh').focus();
                return false;
            }
        }
        if (namedh == '') {
            bootbox.alert('Vui lòng nhập Họ và tên');
            $('#namedh').focus();
            return false;
        }
        if (phonedh == '') {
            bootbox.alert('Vui lòng nhập Số điện thoại');
            $('#phonedh').focus();
            return false;
        }
        if (emaildh == '') {
            bootbox.alert('Vui lòng nhập Email');
            $('#emaildh').focus();
            return false;
        }
        if (timedh == '') {
            bootbox.alert('Vui lòng chọn Thời gian');
            return false;
        }
    });

//    jQuery(document).ready(function () {
//        jQuery('.counter').counterUp({
//            delay: 10,
//            time: 1000
//        });
//    });
//    $('._welcome').marquee({duration: 10000, delayBeforeStart: 1});
//
//    $('._loadmore a').on('click', function () {
//        $('._loadmore a').text('Loading...');
//        var page = $(this).data('page');
//        var pageCount = $(this).data('pagecount');
//        var url = '/products/loadmore.html';
//        $.ajax({
//            url: url,
//            type: "POST",
//            data: {
//                page: page,
//            }, success: function (data) {
//                $('#_result').append(data);
//                $('._loadmore a').data('page', page + 1);
//                var pageChange = $('._loadmore a').data('page');
//                if (pageChange == pageCount) {
//                    $('._loadmore').hide();
//                }
//            }
//        }).always(function () {
//            $('._loadmore a').text('Xem thêm');
//        });
//    });
//
//    var arr = ["Hạnh Nguyễn", "Luân Trần", "Tuấn Vũ"];
//    setInterval(function () {
//        var int = Math.floor(Math.random() * (arr.length));
//        $('#_showmodal').html('<strong style="color: green;"><i class="far fa-check-circle"></i> ' + arr[int] + '</strong> vừa đặt hàng thành công.');
//        $('#_showmodal').addClass('in');
//        setTimeout(function () {
//            $('#_showmodal').removeClass('in');
//        }, 3000);
//    }, 10000);
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

function emailNewsLetter(namedk, phonedk, emaildk, timedk, noidungdk) {
    $.ajax({
        url: '/site/dangky.html',
        type: 'POST',
        data: {
            namedk: namedk,
            phonedk: phonedk,
            emaildk: emaildk,
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
function congContentProduct() {
    $('._box-des-prditail').attr('style', 'overflow: unset;max-height: none;');
    $(".xemthemProducts").html('<a onclick="truContentProduct()" class="tru">Thu gọn<i class="fas fa-sort-up"></i></a>');
}
function truContentProduct() {
    $('._box-des-prditail').attr('style', 'overflow: hidden;max-height: 100px;');
    $(".xemthemProducts").html('<a onclick="congContentProduct()" class="cong">Xem thêm...</a>');
}

function showCart() {
    $('._cart-info').slideToggle('slow');
}

function showTk() {
    $('._box-search').slideToggle('slow');
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

function loadMore() {
    $('._box-search').slideToggle('slow');
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