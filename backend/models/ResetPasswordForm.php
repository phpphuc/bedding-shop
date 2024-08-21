<?php
namespace backend\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\Admin;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    private $_user;
    
    public function __construct($id, $config = [])
    {
        $this->_user = Admin::findById($id);
        if (!$this->_user) {
            throw new InvalidParamException('Wrong user id.');
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'password' => 'Mật khẩu mới',
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);

        return $user->save(false);
    }
}
