<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fallos".
 *
 * @property integer $idFallos
 * @property string $descripcion
 * @property string $respuesta
 * @property string $estado
 * @property integer $idDispositivo
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Dispositivo $idDispositivo0
 */
class Fallos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fallos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'respuesta', 'idDispositivo', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['estado'], 'string'],
            [['idDispositivo', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['descripcion', 'respuesta'], 'string', 'max' => 50],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['idDispositivo'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Dispositivo::className(), 'targetAttribute' => ['idDispositivo' => 'idDispositivo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFallos' => 'Id Fallos',
            'descripcion' => 'Descripcion',
            'respuesta' => 'Respuesta',
            'estado' => 'Estado',
            'idDispositivo' => 'Id Dispositivo',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDispositivo0()
    {
        return $this->hasOne(Dispositivo::className(), ['idDispositivo' => 'idDispositivo']);
    }
}
