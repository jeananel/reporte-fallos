<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dispositivo".
 *
 * @property integer $idDispositivo
 * @property string $serie
 * @property string $nombre
 * @property string $marca
 * @property integer $idDepartamento
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Departamento $idDepartamento0
 * @property Fallos[] $fallos
 */
class Dispositivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dispositivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serie', 'nombre', 'marca', 'idDepartamento', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['idDepartamento', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['serie'], 'string', 'max' => 10],
            [['nombre', 'marca'], 'string', 'max' => 50],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => \dektrium\user\models\User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => \dektrium\user\models\User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['idDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['idDepartamento' => 'idDepartamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDispositivo' => 'Id Dispositivo',
            'serie' => 'Serie',
            'nombre' => 'Nombre',
            'marca' => 'Marca',
            'idDepartamento' => 'Id Departamento',
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
    public function getIdDepartamento0()
    {
        return $this->hasOne(Departamento::className(), ['idDepartamento' => 'idDepartamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFallos()
    {
        return $this->hasMany(Fallos::className(), ['idDispositivo' => 'idDispositivo']);
    }
}
