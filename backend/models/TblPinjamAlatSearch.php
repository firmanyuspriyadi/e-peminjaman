<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPinjamAlat;

/**
 * TblPinjamAlatSearch represents the model behind the search form about `backend\models\TblPinjamAlat`.
 */
class TblPinjamAlatSearch extends TblPinjamAlat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jml_pinjam', 'id_user'], 'integer'],
            [['tgl_pinjam', 'keperluan', 'id_pejabat', 'id_pengguna', 'status_pinjaman'], 'safe'],
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
        $query = TblPinjamAlat::find();

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
            'tgl_pinjam' => $this->tgl_pinjam,
            'jml_pinjam' => $this->jml_pinjam,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'keperluan', $this->keperluan])
            ->andFilterWhere(['like', 'id_pejabat', $this->id_pejabat])
            ->andFilterWhere(['like', 'id_pengguna', $this->id_pengguna])
            ->andFilterWhere(['like', 'status_pinjaman', $this->status_pinjaman]);

        return $dataProvider;
    }
}
