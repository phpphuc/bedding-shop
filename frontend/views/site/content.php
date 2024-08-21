<?php

use kartik\datetime\DateTimePicker;
?>
<div class="_contentdv">
    <div class="_namedv-box"><?= $model['name_' . Yii::$app->language]; ?></div>
    <div><?= $model['content_' . Yii::$app->language]; ?></div>
    <div class="clearfix margin-bottom-20"></div>
    <div class="_datlich"><button class="btn" type="button" data-toggle="modal" data-target="#myModal">Đặt Lịch</button></div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Đặt lịch <strong style="color: #d19539;"><?= $model['name_' . Yii::$app->language]; ?></strong></h4>
            </div>
            <form role="form" id="frmdknt">
                <input type="hidden" name="dichvu" id="dichvu" value="<?= $model['name_' . Yii::$app->language]; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Họ & tên">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phonenum" id="phonenum" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailadd" id="emailadd" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?=
                                DateTimePicker::widget([
                                    'name' => 'ngayhen',
                                    'id' => 'ngayhen',
                                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                                    'readonly' => true,
                                    'options' => ['placeholder' => 'Ngày hẹn...'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'dd/mm/yyyy hh:ii',
                                        'todayHighlight' => true,
                                    ]
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="ghichu" placeholder="Ghi chú" class="form-control" id="ghichu" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-warning" id="senddk">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#senddk').on('click', function () {
        var fullname = $('#fullname').val();
        var phonenum = $('#phonenum').val();
        var emailadd = $('#emailadd').val();
        var ngayhen = $('#ngayhen').val();
        var ghichu = $('#ghichu').val();
        var dichvu = $('#dichvu').val();
        if (fullname != '' && phonenum != '' && emailadd != '' && ngayhen != '' && dichvu != '') {
            if (isValidEmailAddress(emailadd)) {
                emailNewsLetter(fullname, phonenum, emailadd, ngayhen, ghichu, dichvu);
                return false;
            } else {
                bootbox.alert('Email không hợp lệ');
                $('#emailadd').focus();
                return false;
            }
        }
        if (fullname == '') {
            bootbox.alert('Vui lòng nhập Họ và tên');
            $('#fullname').focus();
            return false;
        }
        if (phonenum == '') {
            bootbox.alert('Vui lòng nhập Số điện thoại');
            $('#phonenum').focus();
            return false;
        }
        if (emailadd == '') {
            bootbox.alert('Vui lòng nhập Email');
            $('#emailadd').focus();
            return false;
        }
        if (ngayhen == '') {
            bootbox.alert('Vui lòng chọn ngày hẹn');
            $('#ngayhen').focus();
            return false;
        }
    });
</script>