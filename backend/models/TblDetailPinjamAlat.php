<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detail_pinjam_alat".
 *
 * @property integer $id
 * @property integer $id_pinjam
 * @property integer $id_alat
 * @property string $type
 * @property string $no_serie
 * @property string $ket_alat
 * @property integer $banyak_alat
 *
 * @property TblAlat $idAlat
 * @property TblPinjamAlat $idPinjam
 */
class TblDetailPinjamAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detail_pinjam_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pinjam', 'id_alat', 'banyak_alat'], 'integer'],
            [['type', 'no_serie'], 'string', 'max' => 30],
            [['ket_alat'], 'string', 'max' => 40],
            [['id_alat','banyak_alat'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pinjam' => 'Id Pinjam',
            'id_alat' => 'Alat',
            'type' => 'Type',
            'no_serie' => 'No Serie',
            'ket_alat' => 'Ket Alat',
            'banyak_alat' => 'Banyak Alat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlat()
    {
        return $this->hasOne(TblAlat::className(), ['id' => 'id_alat']);
    }
    
     public function getNamaAlat(){
        return ($this->idAlat) ? $this->idAlat->nm_alat : 'none';
    }
    
    public function getNamaModel(){
        return ($this->idAlat) ? $this->idAlat->idModelAlat->nama_model : 'none';
    }
    
    public function getNoSeri(){
        return ($this->idAlat) ? $this->idAlat->no_seri : 'none';
    }
    
    public function getKondisi(){
        return ($this->idAlat) ? $this->idAlat->kondisi : 'none';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPinjam()
    {
        return $this->hasOne(TblPinjamAlat::className(), ['id' => 'id_pinjam']);
    }
}
