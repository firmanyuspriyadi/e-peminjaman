<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_part_alat".
 *
 * @property integer $id
 * @property integer $id_alat
 * @property integer $id_kat_alat
 * @property integer $id_jns_alat
 * @property integer $id_model_alat
 * @property string $nama_part
 * @property string $no_seri_part
 * @property string $kondisi
 * @property string $tgl_terima
 * @property string $tahun_buat
 * @property integer $banyak
 *
 * @property TblAlat $idAlat
 * @property TblModelAlat $idModelAlat
 * @property TblKatAlat $idKatAlat
 * @property TblJnsAlat $idJnsAlat
 */
class TblPartAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_part_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alat', 'id_kat_alat', 'id_jns_alat', 'id_model_alat', 'banyak'], 'integer'],
            [['tgl_terima'], 'safe'],
            [['nama_part'], 'string', 'max' => 60],
            [['no_seri_part', 'kondisi'], 'string', 'max' => 20],
            [['tahun_buat'], 'string', 'max' => 4],
            [['id_kat_alat','id_jns_alat','id_model_alat','nama_part','no_seri_part','tahun_buat'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_alat' => 'Id Alat',
            'id_kat_alat' => 'Kategori Alat',
            'id_jns_alat' => 'Jenis Alat',
            'id_model_alat' => 'Model Alat',
            'nama_part' => 'Nama Part',
            'no_seri_part' => 'No Seri Part',
            'kondisi' => 'Kondisi',
            'tgl_terima' => 'Tgl Terima',
            'tahun_buat' => 'Tahun Pembelian',
            'banyak' => 'Banyak',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlat()
    {
        return $this->hasOne(TblAlat::className(), ['id' => 'id_alat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModelAlat()
    {
        return $this->hasOne(TblModelAlat::className(), ['id' => 'id_model_alat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKatAlat()
    {
        return $this->hasOne(TblKatAlat::className(), ['id' => 'id_kat_alat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJnsAlat()
    {
        return $this->hasOne(TblJnsAlat::className(), ['id' => 'id_jns_alat']);
    }
}
