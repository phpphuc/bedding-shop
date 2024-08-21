<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model {

    public $name;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'lubosdz\captchaExtended\CaptchaExtendedValidator',
                'captchaAction' => Url::to('/site/captcha'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
        'name' => \Yii::t('app', 'Name'),
        'email' => \Yii::t('app', 'Email'),
        'phone' => \Yii::t('app', 'Phone'),
        'subject' => \Yii::t('app', 'Subject'),
        'body' => \Yii::t('app', 'Body'),
        'verifyCode' => \Yii::t('app', 'VerifyCode'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email) {
        $message = '<div><strong>Họ tên: </strong>' . $this->name . '</div>';
        $message .= '<div><strong>Email: </strong>' . $this->email . '</div>';
        $message .= '<div><strong>Điện thoại: </strong>' . $this->phone . '</div>';
        $message .= '<div><strong>Nội dung: </strong>' . $this->body . '</div>';
        return Yii::$app->mailer->compose()
                        ->setTo($email)
                        ->setFrom([$this->email => $this->name])
                        ->setSubject($this->subject)
                        ->setHtmlBody($message)
                        ->setReplyTo($this->email)
                        ->send();
    }

}
