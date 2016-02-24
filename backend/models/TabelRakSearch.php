<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TabelRak;

/**
 * TabelRakSearch represents the model behind the search form about `backend\models\TabelRak`.
 */
class TabelRakSearch extends TabelRak
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama_rak', 'row'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TabelRak::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nama_rak', $this->nama_rak])
            ->andFilterWhere(['like', 'row', $this->row]);

        return $dataProvider;
    }
}
