<?php

namespace backend\forms;

use Yii;
use common\components\override\FetchForm;
use common\models\UserTransaction;

/**
 * FetchTransactionForm
 */
class FetchTransactionForm extends FetchForm
{   
    public $created_by;
    public $date_from;
    public $date_to;

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
        $command->andWhere(['transaction_type' => UserTransaction::TRANSACTION_INPUT]);
        if (!Yii::$app->user->can('admin')) {
            $this->created_by = Yii::$app->user->id;
            $command->andWhere(['created_by' => $this->created_by]);
        }
        $command = $this->setPagination($command);
        $order = sprintf("%s %s", $this->getOrderField(), $this->getOrder());
        $command->orderBy($order);
        $command->with('creator');
        $command->with('user');
        return $command;
    }
}
