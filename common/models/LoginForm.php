<?php
namespace common\models;

use backend\models\Doctors;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверное имя пользователя или пароль.');
                Yii::$app->session->setFlash('error', 'Неверное имя пользователя или пароль.');
            }
            elseif ($user && $user->status == User::STATUS_BLOCKED) {
                $this->addError($attribute, 'Ваш аккаунт заблокирован.');
                Yii::$app->session->setFlash('error', 'Ваш аккаунт заблокирован.');
            }
            elseif ($user && $user->status == User::STATUS_WAIT) {
                $this->addError($attribute, 'Ваш аккаунт не подтвержден.');
                Yii::$app->session->setFlash('error', 'Ваш аккаунт не подтвежден.');
            }
            elseif ($user && $user->status == User::STATUS_ADMIN_WAIT) {
                $this->addError($attribute, 'Ваш аккаунт не подтвержден от Админ.');
                Yii::$app->session->setFlash('error', 'Ваш аккаунт не подтвержден от Админ.');
            }
        }
    }

    // public function scenarios(){
    //     $scenarios = parent::scenarios();
    //     $scenarios['default'] = ['username', 'password', 'rememberMe'];
    //     return $scenarios;
    // }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
          if ($this->validate()) {

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {

            $this->_user = User::findByUsername($this->username);
        }


        return $this->_user;
    }
}
