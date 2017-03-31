<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DatosUser;

/**
 * DatosUserSearch represents the model behind the search form about `common\models\DatosUser`.
 */
class DatosUserSearch extends DatosUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDatos', 'idUser', 'idDepartamento'], 'integer'],
            [['apellidos', 'nombres', 'fecha_nacimiento', 'genero', 'direccion_principal', 'telefono', 'estado'], 'safe'],
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
        $query = DatosUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idDatos' => $this->idDatos,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'idUser' => $this->idUser,
            'idDepartamento' => $this->idDepartamento,
        ]);

        $query->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'direccion_principal', $this->direccion_principal])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
