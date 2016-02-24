<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_barang".
 *
 * @property integer $id
 * @property string $nm_brg
 * @property string $keterangan
 * @property integer $id_grup_brg
 * @property integer $id_kat_brg
 * @property integer $id_jns_brg
 *
 * @property TabelDetailRetur[] $tabelDetailReturs
 * @property TblGrupBrg $idGrupBrg
 * @property TblKatBrg $idKatBrg
 * @property TblJnsBrg $idJnsBrg
 * @property TblDetailMasukBarang[] $tblDetailMasukBarangs
 * @property TblDetailMinta[] $tblDetailMintas
 * @property TblGudangBrg[] $tblGudangBrgs
 */
class TblBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grup_brg', 'id_kat_brg', 'id_jns_brg'], 'integer'],
            [['nm_brg', 'keterangan'], 'string', 'max' => 30],
            [['nm_brg','keterangan','id_grup_brg','id_kat_brg','id_jns_brg'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_brg' => 'Nama Barang',
            'keterangan' => 'Keterangan',
            'id_grup_brg' => 'Kelompok Barang',
            'id_kat_brg' => 'Kategori Barang',
            'id_jns_brg' => 'Jenis Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelDetailReturs()
    {
        return $this->hasMany(TabelDetailRetur::className(), ['id_barang' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupBrg()
    {
        return $this->hasOne(TblGrupBrg::className(), ['id' => 'id_grup_brg']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKatBrg()
    {
        return $this->hasOne(TblKatBrg::className(), ['id' => 'id_kat_brg']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJnsBrg()
    {
        return $this->hasOne(TblJnsBrg::className(), ['id' => 'id_jns_brg']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailMasukBarangs()
    {
        return $this->hasMany(TblDetailMasukBarang::className(), ['id_brg' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailMintas()
    {
        return $this->hasMany(TblDetailMinta::className(), ['id_barang' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblGudangBrgs()
    {
        return $this->hasMany(TblGudangBrg::className(), ['id_brg' => 'id']);
    }
}
