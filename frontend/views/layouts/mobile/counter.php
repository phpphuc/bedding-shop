<?php
use backend\models\Counter;

$time_now = time();
$time_out = 60;
$ip_address = $_SERVER['REMOTE_ADDR'];

if (!count(Counter::find()->where("UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'")->asArray()->all())) {
    $model = new Counter();
    $model->ip_address = $ip_address;
    $model->last_visit = date('Y-m-d H:i:s', time());
    $model->save();
}
// đếm số người đang online
$online = count(Counter::find()->where("UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now")->asArray()->all());

// đếm số người ghé thăm trong ngày (từ 0h ngày hôm đó đến thời điểm hiện tại)
$day = count(Counter::find()->where("DAYOFYEAR(`last_visit`) = " . (date('z') + 1) . " AND YEAR(`last_visit`) = " . date('Y'))->asArray()->all());

// đếm số người ghé thăm ngay hôm qua 
$yesterday = count(Counter::find()->where("DAYOFYEAR(`last_visit`) = " . (date('z') + 0) . " AND YEAR(`last_visit`) = " . date('Y'))->asArray()->all());

// đếm số người ghé thăm trong tuần (từ 0h ngày thứ 2 đến thời điểm hiện tại)
$week = count(Counter::find()->where("WEEKOFYEAR(`last_visit`) = " . date('W') . " AND YEAR(`last_visit`) = " . date('Y'))->asArray()->all());

// đếm số người ghé thăm tuần trước
$lastweek = count(Counter::find()->where("WEEKOFYEAR(`last_visit`) = " . (date('W') - 1) . " AND YEAR(`last_visit`) = " . date('Y'))->asArray()->all());

// đếm số người ghé thăm trong tháng
$month = count(Counter::find()->where("MONTH(`last_visit`) = " . date('n') . " AND YEAR(`last_visit`) = " . date('Y'))->asArray()->all());

// đếm số người ghé thăm trong năm
$year = count(Counter::find()->where("YEAR(`last_visit`) = " . date('Y'))->asArray()->all());

// đếm tổng số người đã ghé thăm
$visit = count(Counter::find()->asArray()->all());
?>
<ul class="list-inline margin-bottom-0">
    <li>Online: <?= $online; ?></li>
    <li><?= Yii::t('app', 'Day'); ?>: <?= $day; ?></li>
<!--    <li>Hôm qua: </?= $yesterday; ?></li>-->
    <li><?= Yii::t('app', 'Week'); ?>: <?= $week; ?></li>
<!--    <li>Tuần trước: </?= $lastweek; ?></li>-->
    <li><?= Yii::t('app', 'Month'); ?>: <?= $month; ?></li>
<!--    <li>Năm nay: </?= $year; ?></li>-->
    <li><?= Yii::t('app', 'Total'); ?>: <?= $visit; ?></li>
</ul>
<?php
