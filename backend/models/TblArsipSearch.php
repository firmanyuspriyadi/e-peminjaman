<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblArsip;

/**
 * TblArsipSearch represents the model behind the search form about `backend\models\TblArsip`.
 */
class TblArsipSearch extends TblArsip
{
    public function rules()
    {
        return [
            [['id', 'id_folder', 'id_rak'], 'integer'],
            [['keterangan', 'input_date'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblArsip::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_folder' => $this->id_folder,
            'id_rak' => $this->id_rak,
            'input_date' => $this->input_date,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
