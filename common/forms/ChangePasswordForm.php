<?php

namespace common\forms;

use Yii;
use yii\base\Model;
use common\models\Post;
use common\models\PostWarning;

/**
 * ChangePasswordForm 
 */
class ChangePasswordForm extends Model
{
    public $old_password;
    public $new_password;
    public $re_password;

    private $_user;

     /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_password', 'new_password', 're_password'], 'required'],
            ['old_password', 'validatePassword'],
            ['re_password', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }

    public function change()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->setPassword($this->new_password);
            $user->removePasswordResetToken();

            return $user->save(false);
        }
        return false;
    }


    protected function getUser()
    {
        return Yii::$app->user->getIdentity();
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->old_password)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }
}
