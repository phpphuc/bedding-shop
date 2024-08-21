<?php
namespace backend\models;

use yii\base\Model;
use common\models\Admin;
use backend\models\AuthAssignment;

/**
 * Signup form
 */
class AdminSignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $name;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 1, 'max' => 255],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Tên đăng nhập',
            'email' => 'Email',
            'password_hash' => 'Mật khẩu',
            'name' => 'Họ và Tên',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Admin();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->setPassword($this->password_hash);
        $user->generateAuthKey();
        $user->save();
        
        return $user;
    }
    
}
