$(function () {
    $(document).on('click', '.language', function () {
        var lang = $(this).attr('id');
        $.post('site/language', {'lang': lang}, function (data) {
            location.reload();
        });
    });

    $.widget.bridge('uibutton', $.ui.button);

    $(document).on('click', '.fc-day', function () {
        var date = $(this).attr('data-date');
        $.get('event/create', {'date': date}, function (data) {
            $('#modal').modal('show').find('#modalContent').html(data);
        });
    });

    $('#modalButton').click(function () {
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    });

    $(document).ready(function () {
        $(".dropdown-toggle").dropdown();
    });

    $(document).ready(function () {
        $('.sAlias').bind('change keyup', function () {
            $('.tAlias').val(locdau($(this).val()));
        });

    });

    //var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
    var CURRENT_URL = window.location.href,
            $SIDEBAR_MENU = $('.sidebar-menu');
    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('active').parents('ul').parent().addClass('active');

    function locdau(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
        str = str.replace(/-+-/g, "-"); // thay thế 2- thành 1-
        str = str.replace(/^\-+|\-+$/g, "");// cắt bỏ ký tự - ở đầu và cuối chuỗi
        return str;
    }
});

