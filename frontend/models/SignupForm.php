<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use backend\models\AuthAssignment;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $permissions;


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

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['first_name', 'trim'],
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 1, 'max' => 100],
            
            ['last_name', 'trim'],
            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 1, 'max' => 100],
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
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        $permissionsList = $_POST['SignupForm']['permissions'];
        if($permissionsList){
            foreach ($permissionsList as $value) {
              $authAssignment = new AuthAssignment();
              $authAssignment->item_name = $value;
              $authAssignment->user_id = $user->id;
              $authAssignment->save();
            }
        }
        
        return $user;
    }
}
