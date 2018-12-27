<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "cms_post".
 *
 * @property integer $id
 * @property string $h1
 * @property string $slug
 * @property string $text
 * @property integer $category
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;

    public static function tableName()
    {
        return 'cms_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category'], 'integer'],
            [['h1', 'slug', 'text', 'category'], 'required'],
            [['text', 'imgprev'], 'string'],
            [['h1', 'slug'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'h1' => 'Заголовок',
            'slug' => 'Slug',
            'text' => 'Текст',
            'category' => 'Категория',
            'imageFile' => 'Картинка записи',
        ];
    }

    /**
     * @inheritdoc
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }

    public function upload()
    {
        if(isset($this->imageFile)) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imgprev = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            return  $this->imageFile->baseName . '.' . $this->imageFile->extension;
        }
            
      
        
           
       
    }
}
