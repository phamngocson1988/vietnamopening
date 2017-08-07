<?php

namespace common\forms;

use Yii;
use yii\base\Model;
use common\models\Post;
use common\models\PostImage;
use common\models\PostCategory;
use common\models\PostContact;

/**
 * ContactForm is the model behind the contact form.
 */
class InsertPostForm extends Model
{
    public $title;
    public $content;
    public $organization;
    public $location_id;
    public $category_id;
    public $avatar_id;
    public $image = [];
    public $contact_name;
    public $contact_phone;
    public $contact_email;
    public $contact_facebook;

    private $_post;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category_id', 'location_id', 'contact_name', 'contact_phone'], 'required'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_DEFAULT] = ['title', 'content', 'organization', 'location_id', 'category_id', 'avatar_id', 'image', 'contact_name', 'contact_phone', 'contact_email', 'contact_facebook'];
        return $scenarios;
    }

    public function save()
    {
        if ($this->validate()) {
            try {
                $this->initPost();
                return $this->create();
            } catch (Exception $e) {

            }
        }
    }

    protected function create()
    {
        $transaction = Yii::$app->db->beginTransaction();
        $post = $this->getPost();
        try {
            $post->save();
            $newId = $post->id;
            // Images
            if ($this->avatar_id) {
                $mainImage = new PostImage();
                $mainImage->post_id = $newId;
                $mainImage->image_id = $this->avatar_id;
                $mainImage->is_main = 1;
                $mainImage->save();
            }
            
            foreach ($this->image as $imageId) {
                $mainImage = new PostImage();
                $mainImage->post_id = $newId;
                $mainImage->image_id = $imageId;
                $mainImage->save();
            }

            $transaction->commit();
            return $newId;
        } catch (Exception $e) {
            $transaction->rollBack();                
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

    protected function initPost()
    {
        $post = new Post();
        
        $post->title = $this->title;
        $post->content = $this->content;
        $post->organization = ($this->organization) ? Post::ORGANIZATION_COMPANY : Post::ORGANIZATION_PERSON;
        $post->location_id = $this->location_id;
        $post->category_id = $this->category_id;
        $post->user_id = Yii::$app->user->id;
        $post->created_at = strtotime('now');
        $post->updated_at = strtotime('now');
        $post->contact_name = $this->contact_name;
        $post->contact_phone = $this->contact_phone;
        $post->contact_email = $this->contact_email;
        $post->contact_facebook = $this->contact_facebook;

        $this->_post = $post;
    }

    protected function getPost()
    {
        return $this->_post;
    }

}
