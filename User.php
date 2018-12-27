<?php

//use Yii;

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return '{{%cms_user}}';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'password' => 'Пароль',
            'created' => 'Зарегистрирован',
            'ban' => 'Бан',
            'role' => 'Роль',
            'email' => 'E-mail',
            'verifyCode' => 'Каптча',
        ];
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}



/*
 
class User extends \yii\db\ActiveRecord
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';
    public $verifyCode;

    /**
     * @inheritdoc
     
    public static function tableName()
    {
        return '{{%cms_user}}';
    }

    /**
     * @inheritdoc
     
    public function rules()
    {
        return [
            [['username', 'password', 'created', 'ban', 'role', 'email'], 'required'],
            [['ban', 'role'], 'integer'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['created'], 'string', 'max' => 11],
            
        ];
    }

    /**
     * @inheritdoc
     


    public static function all() {
        return ArrayHelper::map(User::find()->all(), 'id', 'username');
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created = time();
            $this->ban = 1;
            $this->role = 1;
        }
        $this->password = md5($this->password);
        parent::beforeSave($insert);
    }
}
*/