<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cms_comments}}".
 *
 * @property integer $id
 * @property string $content
 * @property integer $page_id
 * @property integer $created
 * @property integer $user_id
 * @property string $guest
 * @property integer $status
 */
class Comments extends \yii\db\ActiveRecord
{
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['post_id', 'created', 'user_id', 'status'], 'integer'],
            [['guest'], 'string', 'max' => 15],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Текст',
            'page_id' => 'Страница',
            'created' => 'Дата',
            'user_id' => 'Пользователь',
            'guest' => 'Имя (гость)',
            'status' => 'Статус',
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created = time();
        }
        return true;
    }

    public static function all() {
        $query = Comments::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->andFilterWhere(['page_id' => $page_id])
        ->andFilterWhere(['status' => 1])
        ->orderBy(['created' => SORT_DESC]);

        return $dataProvider;
    }
}
