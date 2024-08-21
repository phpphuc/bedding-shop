<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "khachhang".
 *
 * @property int $id
 * @property string $fullname
 * @property string $phone
 * @property string $bacsi
 * @property string $email
 * @property string $content
 * @property string $created_date
 * @property int $status
 */
class Khachhang extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'khachhang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['fullname', 'phone', 'email', 'bacsi', 'phongkham', 'thoigian'], 'required'],
            [['content', 'bacsi', 'phongkham', 'thoigian'], 'string'],
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
            'bacsi' => 'Bác sĩ',
            'email' => 'Email',
            'content' => 'Nội dung',
            'phongkham' => 'Chi nhánh',
            'thoigian' => 'Ngày hẹn',
            'created_date' => 'Ngày gửi',
            'status' => 'Tình trạng',
        ];
    }
	
	public function sendEmail($email) {
        $message = '<div><strong>Họ tên: </strong>' . $this->fullname . '</div>';
        $message .= '<div><strong>Điện thoại: </strong>' . $this->phone . '</div>';
		$message .= '<div><strong>Email: </strong>' . $this->email . '</div>';
		$message .= '<div><strong>Chi nhánh: </strong>' . $this->phongkham . '</div>';
		$message .= '<div><strong>Bác sĩ: </strong>' . $this->bacsi . '</div>';
		$message .= '<div><strong>Ngày hẹn: </strong>' . $this->thoigian . '</div>';
		$message .= '<div><strong>Nội dung: </strong>' . $this->content . '</div>';
        return Yii::$app->mailer->compose()
                        ->setTo($email)
                        ->setFrom([$this->email => $this->fullname])
                        ->setSubject('Đặt lịch hẹn với bác sĩ')
                        ->setHtmlBody($message)
                        ->setReplyTo($this->email)
                        ->send();
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created_date = date('Y-m-d H:i:s', time());
        }
        return true;
    }

}
