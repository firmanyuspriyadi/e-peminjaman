<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblMintaBhnBaku;

/**
 * TblMintaBhnBakuSearch represents the model behind the search form about `backend\models\TblMintaBhnBaku`.
 */
class TblMintaBhnBakuSearch extends TblMintaBhnBaku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nmr_minta', 'keperluan', 'tgl_minta','pemohon'], 'safe'],
            [['banyak'], 'integer'],
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
        $query = TblMintaBhnBaku::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'banyak' => $this->banyak,
            'tgl_minta' => $this->tgl_minta,
        ]);

        $query->andFilterWhere(['like', 'nmr_minta', $this->nmr_minta])
            ->andFilterWhere(['like', 'keperluan', $this->keperluan]);

        return $dataProvider;
    }
}
