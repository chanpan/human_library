<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $firstname;
    public $lastname;
    public $tel;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username', 'firstname','lastname','confirm_password','tel'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            [['confirm_password'], 'compare', 'compareAttribute'=>'password', 'message'=> 'รหัสผ่านไม่ตรงกัน'],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    public function attributeLabels() {
        return [
            'firstname'=>'ชื่อ',
            'lastname'=>'นามสกุล',
            'password'=>'รหัสผ่าน',
            'username'=>'ชื่อผู้ใช้งาน',
            'email'=>'อีเมล์',
            'tel'=>'เบอร์โทรศัพท์',
            'confirm_password'=>'ยืนยันรหัสผ่าน'
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
        $user->firstname= $this->firstname;
        $user->lastname = $this->lastname;
        $user->tel = $this->tel;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
