<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cms_category}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $position
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'position'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['position'], 'string', 'max' => 8],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'position' => 'Позиция',
        ];
    }

    public static function all() {
        return ArrayHelper::map(Category::find()->all(), 'id', 'title');
    }

    public static function menu($position) {
        $models = Category::find()->where(['position' => $position])->all();
        $array = [];

        if ($position == 'top') {
            $array[] = array('label'=>'Главная', 'url'=>array('web/site/index'));
        }
        foreach ($models as $one) {
            $array[] = array('label' => $one->title, 'url' => array('web/page/index/id/' . $one->id));
        }
        if ($position == 'top') {
            $array[] = array('label'=>'Вход', 'url'=>array('web/site/login'),
                'visible'=>Yii::$app()->user->isGuest);
            $array[] = array('label'=>'Выход ('.Yii::$app()->user->name.')',
                'url'=>array('web/site/logout'), 'visible'=>!Yii::$app()->user->isGuest);
            $array[] = array('label'=>'Регистрация',
                'url'=>array('web/site/registration'), 'visible'=>Yii::$app()->user->isGuest);
            if (Yii::$app()->user->checkAccess('2')) {
                $array[] = array('label'=>'Админка', 'url'=>array('web/admin'));
            }
        }
        return $array;
    }
}
