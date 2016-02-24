<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblJnsBrg;

/**
 * TblJnstBrgSearch represents the model behind the search form about `backend\models\TblJnsBrg`.
 */
class TblJnstBrgSearch extends TblJnsBrg
{
    public function rules()
    {
        return [
            [['id', 'id_kat_brg'], 'integer'],
            [['nama_jns_brg', 'satuan'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblJnsBrg::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_kat_brg' => $this->id_kat_brg,
        ]);

        $query->andFilterWhere(['like', 'nama_jns_brg', $this->nama_jns_brg])
            ->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
