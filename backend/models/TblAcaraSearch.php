<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblAcara;

/**
 * TblAcaraSearch represents the model behind the search form about `backend\models\TblAcara`.
 */
class TblAcaraSearch extends TblAcara
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['jns_acara', 'nm_acara', 'tgl_acara', 'jam_acara', 'tmpt_acara'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblAcara::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_acara' => $this->tgl_acara,
        ]);

        $query->andFilterWhere(['like', 'jns_acara', $this->jns_acara])
            ->andFilterWhere(['like', 'nm_acara', $this->nm_acara])
            ->andFilterWhere(['like', 'jam_acara', $this->jam_acara])
            ->andFilterWhere(['like', 'tmpt_acara', $this->tmpt_acara]);

        return $dataProvider;
    }
}
