<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_kat_brg".
 *
 * @property integer $id
 * @property string $nama_kat
 * @property integer $id_grup_brg
 *
 * @property TblBarang[] $tblBarangs
 * @property TblJnsBrg[] $tblJnsBrgs
 * @property TblGrupBrg $idGrupBrg
 */
class TblKatBrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kat_brg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grup_brg'], 'integer'],
            [['nama_kat'], 'string', 'max' => 20],
            [['id_grup_brg','nama_kat'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kat' => 'Nama Kategori',
            'id_grup_brg' => 'Grup',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBarangs()
    {
        return $this->hasMany(TblBarang::className(), ['id_kat_brg' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblJnsBrgs()
    {
        return $this->hasMany(TblJnsBrg::className(), ['id_kat_brg' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupBrg()
    {
        return $this->hasOne(TblGrupBrg::className(), ['id' => 'id_grup_brg']);
    }
    
    public function getKategoribyID($group)
    {
       $data = TblKatBrg::find()->where(['id_grup_brg'=>$group])->select(['id','nama_kat as name'])->asArray()->all(); 
       $value = (count ($data)==0) ? ['Tidak ada data'=>'Tidak Ada Data'] : $data;
       return $value;
    }
    
    public function getJenisbyID($kat)
    {
        $data2 = TblJnsBrg::find()->where(['id_kat_brg'=>$kat])->select(['id','nama_jns_brg as name'])->asArray()->all();
        $value2 = (count ($data2) ==0) ? ['Tidak ada data'=>'Tidak ada data'] : $data2;
        return $value2;
    }
}

