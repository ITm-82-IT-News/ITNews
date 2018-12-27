<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cms_page}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $created
 * @property integer $status
 * @property integer $category_id
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['created', 'status', 'category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Содержание',
            'created' => 'Дата',
            'status' => 'Статус',
            'category_id' => 'Категория',
        ];
    }

    public static function all() {
        return ArrayHelper::map(Page::find()->all(), 'id', 'title');
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created = time();
        }      

        return true;
    }
}
