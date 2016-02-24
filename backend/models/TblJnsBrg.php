<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_jns_brg".
 *
 * @property integer $id
 * @property string $nama_jns_brg
 * @property string $satuan
 * @property integer $id_kat_brg
 *
 * @property TblBarang[] $tblBarangs
 * @property TblKatBrg $idKatBrg
 */
class TblJnsBrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jns_brg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kat_brg'], 'integer'],
            [['nama_jns_brg'], 'string', 'max' => 30],
            [['satuan'], 'string', 'max' => 14],
            [['id_kat_brg','nama_jns_brg','satuan'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_jns_brg' => 'Nama Jenis',
            'satuan' => 'Satuan',
            'id_kat_brg' => 'Kategori Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBarangs()
    {
        return $this->hasMany(TblBarang::className(), ['id_jns_brg' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKatBrg()
    {
        return $this->hasOne(TblKatBrg::className(), ['id' => 'id_kat_brg']);
    }
}
