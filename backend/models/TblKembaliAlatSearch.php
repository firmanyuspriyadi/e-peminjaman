<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblKembaliAlat;

/**
 * TblKembaliAlatSearch represents the model behind the search form about `backend\models\TblKembaliAlat`.
 */
class TblKembaliAlatSearch extends TblKembaliAlat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pinjam', 'tgl_balikin', 'id_user'], 'integer'],
            [['id_pengguna'], 'safe'],
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
        $query = TblKembaliAlat::find();

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
            'id_pinjam' => $this->id_pinjam,
            'tgl_balikin' => $this->tgl_balikin,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'id_pengguna', $this->id_pengguna]);

        return $dataProvider;
    }
}
