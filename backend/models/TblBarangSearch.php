<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblBarang;

/**
 * TblBarangSearch represents the model behind the search form about `backend\models\TblBarang`.
 */
class TblBarangSearch extends TblBarang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_grup_brg', 'id_kat_brg', 'id_jns_brg'], 'integer'],
            [['nm_brg', 'keterangan'], 'safe'],
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
        $query = TblBarang::find();

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
            'id' => $this->id,
            'id_grup_brg' => $this->id_grup_brg,
            'id_kat_brg' => $this->id_kat_brg,
            'id_jns_brg' => $this->id_jns_brg,
        ]);

        $query->andFilterWhere(['like', 'nm_brg', $this->nm_brg])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
