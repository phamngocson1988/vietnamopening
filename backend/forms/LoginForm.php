<?php
namespace backend\forms;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;

    private $_user;
    private $_roles = ['root', 'admin'];


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // user must be a staff
            ['username', 'isStaff', 'message' => 'You are not allowed to login'],
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
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function isStaff($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $auth = Yii::$app->authManager;
            $user = $this->getUser();
            $roles = $auth->getRolesByUser($user->id);
            $roleNames = array_keys($roles);
            $allowedRoles = $this->_roles;
            $matches = array_intersect($roleNames, $allowedRoles);
            if (count($matches) < 1) {
                $this->addError($attribute, 'You are not allowed to login.');
                return false;
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
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
