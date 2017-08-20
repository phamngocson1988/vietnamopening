<?php

namespace backend\forms;

use Yii;
use yii\base\Model;
use common\models\UserTransaction;
use common\models\User;

/**
 * CreateTransactionForm is the model behind the contact form.
 */
class CreateTransactionForm extends Model
{
    public $user_id;
    public $money;
    public $coin;
    public $promotion;
    public $description;
    public $password;

    public $email;
    public $username;
    public $name;
    public $phone;
    public $address;

    public function rules()
    {
        return [
            [['email', 'username', 'name', 'phone', 'address'], 'trim'],
            [['user_id', 'money', 'coin', 'description', 'password'], 'required'],
            ['promotion', 'default', 'value' => 0],
            ['user_id', 'validateUser'],
            ['password', 'validateCreatorPassword']
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            try {
                $userTransaction = new UserTransaction();
                $userTransaction->user_id = $this->user_id;
                $userTransaction->money = $this->money;
                $userTransaction->coin = $this->coin;
                $userTransaction->promotion = $this->promotion;
                $userTransaction->description = $this->description;
                $userTransaction->transaction_date = strtotime('now');
                $userTransaction->transaction_type = UserTransaction::TRANSACTION_INPUT;
                $userTransaction->created_by = Yii::$app->user->id;
                return $userTransaction->save();
            } catch (Exception $e) {
                return false;
            }
        }
        return false;
    }

    public function validateUser($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $userId = $this->$attribute;
            $user = User::findOne($userId);
            if (!$user) {
                $this->addError($attribute, "User is not exist!");
            }
        }
    }

    public function validateCreatorPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $password = $this->$attribute;
            $creator = Yii::$app->user->getIdentity();
            if (!$creator->validatePassword($password)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }
}
