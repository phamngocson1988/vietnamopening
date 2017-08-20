<?php

namespace common\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%user_transaction}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $transaction_date
 * @property integer $transaction_type
 * @property integer $money
 * @property integer $coin
 * @property integer $promotion
 * @property string $description
 * @property string $created_by
 */
class UserTransaction extends \yii\db\ActiveRecord
{

    const TRANSACTION_INPUT = 1;
    const TRANSACTION_OUTPUT = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_transaction}}';
    }

    public function getTransactionDate($format = false)
    {
        if ($format == true) {
            return date(Yii::$app->params['date_format'], $this->transaction_date);
        }
        return $this->transaction_date;
    }

    public function getTransactionType()
    {
        switch ($this->transaction_type) {
            case self::TRANSACTION_INPUT:
                return 'Input';
                break;
            case self::TRANSACTION_INPUT:
                return 'Output';
                break;
            default:
                return '';
                break;
        }
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserName()
    {
        $user = $this->user;
        if ($user) {
            return $user->name;
        }
        return '';
    }

    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getCreatorName()
    {
        $user = $this->creator;
        if ($user) {
            return $user->name;
        }
        return '';
    }

    public function getMoney($format = false)
    {
        if ($format === true) {
            return number_format((int)$this->money);
        }
        return (int)$this->money;
    }

    public function getCoin($format = false)
    {
        if ($format === true) {
            return number_format((int)$this->coin);
        }
        return (int)$this->coin;
    }

    public function getPromotion($format = false)
    {
        if ($format === true) {
            return number_format((int)$this->promotion);
        }
        return (int)$this->promotion;
    }
}
