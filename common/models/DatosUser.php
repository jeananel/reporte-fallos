<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "datos_user".
 *
 * @property integer $idDatos
 * @property string $apellidos
 * @property string $nombres
 * @property string $fecha_nacimiento
 * @property string $genero
 * @property string $direccion_principal
 * @property string $telefono
 * @property integer $idUser
 * @property integer $idDepartamento
 * @property string $estado
 *
 * @property User $idUser0
 * @property Departamento $idDepartamento0
 */
class DatosUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datos_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apellidos', 'nombres', 'idUser', 'idDepartamento'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['genero', 'estado'], 'string'],
            [['idUser', 'idDepartamento'], 'integer'],
            [['apellidos', 'nombres'], 'string', 'max' => 50],
            [['direccion_principal'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 10],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idDepartamento'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\models\Departamento::className(), 'targetAttribute' => ['idDepartamento' => 'idDepartamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDatos' => 'Id Datos',
            'apellidos' => 'Apellidos',
            'nombres' => 'Nombres',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'genero' => 'Genero',
            'direccion_principal' => 'Direccion Principal',
            'telefono' => 'Telefono',
            'idUser' => 'Usuario',
            'idDepartamento' => 'Departamento',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento0()
    {
        return $this->hasOne(Departamento::className(), ['idDepartamento' => 'idDepartamento']);
    }
}
