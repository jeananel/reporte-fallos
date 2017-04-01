<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fallos;

/**
 * FallosSearch represents the model behind the search form about `common\models\Fallos`.
 */
class FallosSearch extends Fallos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFallos', 'idDispositivo', 'created_by', 'updated_by'], 'integer'],
            [['descripcion', 'respuesta', 'estado', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = $this->getAllLeft(\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()])->idDepartamento);
         $query = Fallos::find()
                 ->select(['fallos.*','fallos.idFallos','fallos.idDispositivo',  'fallos.created_by','fallos.created_at','fallos.updated_by','fallos.updated_at', "fallos.descripcion" ,  "fallos.respuesta", "fallos.estado" ])
            ->from('fallos')
            ->leftJoin('dispositivo', '`dispositivo`.`idDispositivo` = `fallos`.`idDispositivo`')
            ->leftJoin('departamento', '`departamento`.`idDepartamento` = `dispositivo`.`idDepartamento` ')
                ->where(['departamento.idDepartamento'=>\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()])->idDepartamento]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [ 'pageSize' => 5 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idFallos' => $this->idFallos,
            'idDispositivo' => $this->idDispositivo,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'respuesta', $this->respuesta])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        
        return $dataProvider;
    }

//        //CONSULTA PERSONALIZADA 
//    public function getAllLeft($departamento){
//        //CONCAT(Nombre,  ' ', Apellido) as NombreCte
//        $query = new \yii\db\Query();
//        $query
//            ->select(['fallos.*','fallos.idFallos','fallos.idDispositivo',  'fallos.created_by','fallos.created_at','fallos.updated_by','fallos.updated_at', "fallos.descripcion" ,  "fallos.respuesta", "fallos.estado" ])
//            ->from('fallos')
//            ->leftJoin('dispositivo', '`dispositivo`.`idDispositivo` = `fallos`.`idDispositivo`')
//            ->leftJoin('departamento', '`departamento`.`idDepartamento` = `dispositivo`.`idDepartamento` ')
//                ->where(['departamento.idDepartamento'=>$departamento]);
//            
//        $cmd = $query->createCommand();
//        $padres = $cmd->queryAll();
//        
//        return $padres;
//    }    
    
    
}
