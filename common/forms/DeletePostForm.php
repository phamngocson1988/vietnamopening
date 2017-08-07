<?php

namespace common\forms;

use Yii;
use yii\base\Model;
use common\models\Post;
use common\models\PostWarning;
use common\models\PostImage;
use common\models\PostTag;

/**
 * DeletePostForm is the model behind the contact form.
 */
class DeletePostForm extends Model
{
    public $id;

    private $_post;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'required'],
            ['id', 'validatePost'],
            ['id', 'validateUser'],
        ];
    }

    public function delete()
    {
        if ($this->validate()) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                PostWarning::deleteAll(['post_id' => $this->id]);
                PostImage::deleteAll(['post_id' => $this->id]);
                PostTag::deleteAll(['post_id' => $this->id]);

                $post = $this->getPost();
                $post->delete();
                $transaction->commit();
                return true;
            } catch (\Exception $e) {
                $transaction->rollBack();                
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
        return false;


    }

    public function getId()
    {
        return $this->id;
    }

    public function validateUser($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = Yii::$app->user->getIdentity();
            $post = $this->getPost();
            if ($post->user_id != $user->getId()) {
                $this->addError($attribute, 'You don\'t have enough permission to delete this post');
            }
        }
    }

    public function validatePost($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $post = $this->getPost();
            if (!$post) {
                $this->addError($attribute, 'Invalid post.');
            }
        }
    }

    protected function getPost()
    {
        if ($this->_post === null) {
            $this->_post = Post::findOne($this->id);
        }

        return $this->_post;
    }
}
