<?php

namespace common\forms;

use Yii;
use common\components\override\FetchForm;
use common\models\UserTransaction;

/**
 * FetchUserTransactionForm is the model behind the contact form.
 */
class FetchUserTransactionForm extends FetchForm
{
    public function fetch()
    {
        $command = $this->createCommand();
        $this->_list = $command->all();
        $this->_command = $command;
        return $this->getList();
    }

    protected function createCommand()
    {
        $command = UserTransaction::find();
        $command->where(['user_id' => Yii::$app->user->id]);
        $command = $this->setPagination($command);
        $order = sprintf("%s %s", $this->getOrderField(), $this->getOrder());
        $command->orderBy($order);
        return $command;
    }
}
