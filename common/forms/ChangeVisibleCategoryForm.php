<?php

namespace common\forms;

use Yii;
use yii\base\Model;
use common\models\Category;

/**
 * ChangeVisibleCategoryForm is the model behind the contact form.
 */
class ChangeVisibleCategoryForm extends Model
{
    public $id;
    public $visible;

    public function rules()
    {
        return [
            ['id', 'required'],
        ];
    }

    public function change()
    {
        return Category::updateAll(['visible' => $this->getVisible()], ['id' => $this->getId()]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getVisible()
    {
        return (int)$this->visible;
    }
}
