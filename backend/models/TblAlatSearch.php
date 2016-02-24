<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblAlat;

/**
 * TblAlatSearch represents the model behind the search form about `backend\models\TblAlat`.
 */
class TblAlatSearch extends TblAlat
{
    public function rules()
    {
        return [
            [['id', 'id_kat_alat', 'id_jns_alat', 'id_model_alat', 'banyak'], 'integer'],
            [['nm_alat', 'no_seri', 'kondisi', 'tgl_terima', 'tahun_buat', 'status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblAlat::find()->where('kondisi =:kondisi and status=:status',[':kondisi'=>'Baik',':status'=>'Kembali']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $query->joinWith('idJnsAlat');
        
        $query->joinWith('idModelAlat');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_model_alat' => $this->id_kat_alat,
           
            'tgl_terima' => $this->tgl_terima,
            'banyak' => $this->banyak,
        ]);

        $query->andFilterWhere(['like', 'nm_alat', $this->nm_alat])
            ->andFilterWhere(['like', 'no_seri', $this->no_seri])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi])
            ->andFilterWhere(['like', 'tahun_buat', $this->tahun_buat])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like','tbl_jns_alat.merk',$this->id_jns_alat])
            
            ->andFilterWhere(['like','tbl_model_alat.nama_model',$this->id_model_alat])
            ->orderBy('id_jns_alat,id_model_alat');

        return $dataProvider;
    }
    
    public function search2($params)
    {
        $query = TblAlat::find()->where(['NOT IN','status',['Dipinjam']]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $query->joinWith('idJnsAlat');
        $query->joinWith('idKatAlat');
        $query->joinWith('idModelAlat');
        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            
            'tgl_terima' => $this->tgl_terima,
            'banyak' => $this->banyak,
        ]);

        $query->andFilterWhere(['like', 'nm_alat', $this->nm_alat])
            ->andFilterWhere(['like', 'no_seri', $this->no_seri])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi])
            ->andFilterWhere(['like', 'tahun_buat', $this->tahun_buat])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like','tbl_jns_alat.merk',$this->id_jns_alat])
            ->andFilterWhere(['like','tbl_kat_alat.kat_alat',$this->id_kat_alat])
            ->andFilterWhere(['like','tbl_model_alat.nama_model',$this->id_model_alat])
            ->orderBy(' kondisi desc');

        return $dataProvider;
    }
    
    public function search3($params)
    {
        $query = TblAlat::find()->where('kondisi=:kondisi',[':kondisi'=>'Baik']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $query->joinWith('idJnsAlat');
        $query->joinWith('idKatAlat');
        $query->joinWith('idModelAlat');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            
           
            'tgl_terima' => $this->tgl_terima,
            'banyak' => $this->banyak,
        ]);

        $query->andFilterWhere(['like', 'nm_alat', $this->nm_alat])
            ->andFilterWhere(['like', 'no_seri', $this->no_seri])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi])
            ->andFilterWhere(['like', 'tahun_buat', $this->tahun_buat])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like','tbl_jns_alat.merk',$this->id_jns_alat])
            ->andFilterWhere(['like','tbl_kat_alat.kat_alat',$this->id_kat_alat])
            ->andFilterWhere(['like','tbl_model_alat.nama_model',$this->id_model_alat])
            ->orderBy('status, id_jns_alat,id_kat_alat, id_model_alat asc');

        return $dataProvider;
    }
}
