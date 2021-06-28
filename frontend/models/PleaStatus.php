<?php

namespace frontend\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "plea_status".
 *
 * @property int $id
 * @property string|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class PleaStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plea_status';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ]; // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status','required'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PleaStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PleaStatusQuery(get_called_class());
    }

    public function getCreator()
    {
        return $this->hasOne(User::className(),['id' => 'created_by']);
    }

    public function getUpdator()
    {
        return $this->hasOne(User::className(),['id' => 'created_by']);
    }
}
