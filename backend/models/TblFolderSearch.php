<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblFolder;

/**
 * TblFolderSearch represents the model behind the search form about `backend\models\TblFolder`.
 */
class TblFolderSearch extends TblFolder
{
    public function rules()
    {
        return [
            [['id', 'tahun'], 'integer'],
            [['nama_folder', 'bulan'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblFolder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'nama_folder', $this->nama_folder])
            ->andFilterWhere(['like', 'bulan', $this->bulan]);

        return $dataProvider;
    }
}
