<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cms_meta".
 *
 * @property int $id
 * @property string $name
 *
 * @property CmsPostMeta[] $cmsPostMetas
 */
class Meta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cms_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostMetas()
    {
        return $this->hasMany(CmsPostMeta::className(), ['meta_id' => 'id']);
    }
}
