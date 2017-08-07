<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $visible
 */
class Location extends \yii\db\ActiveRecord
{
    const INVISIBLE = 0;
    const VISIBLE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%location}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['visible'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'visible' => 'Visible',
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getVisible() 
    {
        return (int) $this->visible;
    }

    public function isVisible()
    {
        return $this->getVisible() === self::VISIBLE;
    }
}
