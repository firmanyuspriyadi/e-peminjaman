<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblKasetLiputan;

/**
 * TblKasetLiputanSearch represents the model behind the search form about `backend\models\TblKasetLiputan`.
 */
class TblKasetLiputanSearch extends TblKasetLiputan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_kaset', 'nm_kategori', 'input_date'], 'safe'],
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
        $query = TblKasetLiputan::find();

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
            'input_date' => $this->input_date,
        ]);

        $query->andFilterWhere(['like', 'nomor_kaset', $this->nomor_kaset])
            ->andFilterWhere(['like', 'nm_kategori', $this->nm_kategori]);

        return $dataProvider;
    }
}
