<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_alat".
 *
 * @property integer $id
 * @property integer $id_kat_alat
 * @property integer $id_jns_alat
 * @property integer $id_model_alat
 * @property string $nm_alat
 * @property string $no_seri
 * @property string $kondisi
 * @property string $tgl_terima
 * @property string $tahun_buat
 * @property integer $banyak
 * @property string $status
 *
 * @property TblModelAlat $idModelAlat
 * @property TblJnsAlat $idJnsAlat
 * @property TblKatAlat $idKatAlat
 * @property TblDetailKembaliAlat[] $tblDetailKembaliAlats
 * @property TblDetailPinjamAlat[] $tblDetailPinjamAlats
 * @property TblGudangAlat[] $tblGudangAlats
 * @property TblPartAlat[] $tblPartAlats
 */
class TblAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kat_alat', 'id_jns_alat', 'id_model_alat', 'banyak'], 'integer'],
            [['kondisi', 'status'], 'string'],
            [['tgl_terima'], 'safe'],
            [['nm_alat', 'no_seri'], 'string', 'max' => 50],
            [['tahun_buat'], 'string', 'max' => 4],
            [['no_seri'], 'unique'],
            [['id_kat_alat','id_jns_alat','id_model_alat', 'nm_alat','no_seri','kondisi','tahun_buat','banyak'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kat_alat' => 'Kategori Alat',
            'id_jns_alat' => 'Merk',
            'id_model_alat' => 'Tipe Alat',
            'nm_alat' => 'Nama Alat',
            'no_seri' => 'No Seri',
            'kondisi' => 'Kondisi',
            'tgl_terima' => 'Tanggal Terima',
            'tahun_buat' => 'Tahun Buat',
            'banyak' => 'Banyak',
            'status' => 'Status',
        ];
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
    public function getIdJnsAlat()
    {
        return $this->hasOne(TblJnsAlat::className(), ['id' => 'id_jns_alat']);
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
    public function getTblDetailKembaliAlats()
    {
        return $this->hasMany(TblDetailKembaliAlat::className(), ['id_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailPinjamAlats()
    {
        return $this->hasMany(TblDetailPinjamAlat::className(), ['id_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblGudangAlats()
    {
        return $this->hasMany(TblGudangAlat::className(), ['id_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPartAlats()
    {
        return $this->hasMany(TblPartAlat::className(), ['id_alat' => 'id']);
    }
}
