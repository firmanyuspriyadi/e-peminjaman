<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblKatBrg;

/**
 * TblKatBrgSearch represents the model behind the search form about `backend\models\TblKatBrg`.
 */
class TblKatBrgSearch extends TblKatBrg
{
    public function rules()
    {
        return [
            [['id', 'id_grup_brg'], 'integer'],
            [['nama_kat'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblKatBrg::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_grup_brg' => $this->id_grup_brg,
        ]);

        $query->andFilterWhere(['like', 'nama_kat', $this->nama_kat]);

        return $dataProvider;
    }
}
