<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "baogia".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $email
 * @property string $content
 * @property string $created_date
 * @property string $address
 * @property string $thoigian
 * @property int $status
 */
class Baogia extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'baogia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['fullname', 'email', 'phone', 'thoigian'], 'required'],
            [['content', 'address', 'thoigian'], 'string'],
            [['created_date'], 'safe'],
            [['status'], 'integer'],
            [['fullname', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fullname' => 'Họ tên',
            'phone' => 'Điện thoại',
            'email' => 'Email',
            'content' => 'Nội dung',
            'created_date' => 'Ngày gửi',
            'address' => 'Chi nhánh',
            'status' => 'Tình trạng',
            'thoigian' => 'Ngày hẹn',
        ];
    }

    public function sendEmail($email) {
        $message = '<div><strong>Họ tên: </strong>' . $this->fullname . '</div>';
        $message .= '<div><strong>Điện thoại: </strong>' . $this->phone . '</div>';
		$message .= '<div><strong>Email: </strong>' . $this->email . '</div>';
		$message .= '<div><strong>Ngày hẹn: </strong>' . $this->thoigian . '</div>';
		$message .= '<div><strong>Nội dung: </strong>' . $this->content . '</div>';
        return Yii::$app->mailer->compose()
                        ->setTo($email)
                        ->setFrom([$this->email => $this->fullname])
                        ->setSubject('Đặt lịch hẹn')
                        ->setHtmlBody($message)
                        ->setReplyTo($this->email)
                        ->send();
    }

}
