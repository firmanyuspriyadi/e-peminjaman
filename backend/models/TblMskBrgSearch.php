<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblMskBrg;

/**
 * TblMskBrgSearch represents the model behind the search form about `backend\models\TblMskBrg`.
 */
class TblMskBrgSearch extends TblMskBrg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jml_msk'], 'integer'],
            [['tgl_msk'], 'safe'],
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
        $query = TblMskBrg::find();

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
            'jml_msk' => $this->jml_msk,
            'tgl_msk' => $this->tgl_msk,
        ]);

        return $dataProvider;
    }
}
