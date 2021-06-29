<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entreprises".
 *
 * @property int $id
 * @property string $name
 * @property string|null $entreprise_url
 * @property string|null $email
 * @property string|null $entreprise_bio
 * @property string|null $create_date
 * @property string|null $update_date
 * @property string|null $create_by
 * @property string|null $update_by
 *
 * @property EntreprisesHasUsers[] $entreprisesHasUsers
 * @property User[] $users
 */
class Entreprises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entreprises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['entreprise_bio'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['name', 'entreprise_url', 'email', 'create_by', 'update_by'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['entreprise_url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'entreprise_url' => Yii::t('app', 'Entreprise Url'),
            'email' => Yii::t('app', 'Email'),
            'entreprise_bio' => Yii::t('app', 'Entreprise Bio'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_date' => Yii::t('app', 'Update Date'),
            'create_by' => Yii::t('app', 'Create By'),
            'update_by' => Yii::t('app', 'Update By'),
        ];
    }

    /**
     * Gets query for [[EntreprisesHasUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntreprisesHasUsers()
    {
        return $this->hasMany(EntreprisesHasUsers::className(), ['entreprises_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'users_id'])->viaTable('entreprises_has_users', ['entreprises_id' => 'id']);
    }
}
