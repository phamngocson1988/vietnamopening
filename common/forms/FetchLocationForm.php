<?php
namespace common\forms;

use yii\base\Model;
use common\models\Location;
use Yii;

class FetchLocationForm extends Model
{
    public $visible;

    protected $_list;

    public function fetch()
    {
        $command = $this->createCommand();
        $this->_list = $command->all();
        return $this->getList();
    }

    public function count()
    {
        $command = $this->createCommand();
        $this->_total = $command->count();
        return $this->getTotal();
    }

    protected function createCommand()
    {
        $command = Location::find();
        if ($this->visible !== null) {
            $command->where(['visible' => (boolean)$this->visible]);
        }
        return $command;
    }

    public function getList()
    {
        return $this->_list;
    }
}