<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_pengguna".
 *
 * @property string $nip
 * @property string $nama
 * @property string $pangkat
 * @property string $golongan
 * @property string $jabatan
 *
 * @property TblKembaliAlat[] $tblKembaliAlats
 * @property TblPinjamAlat[] $tblPinjamAlats
 */
class TblPengguna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pengguna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['nip', 'pangkat'], 'string', 'max' => 25],
            [['nama'], 'string', 'max' => 255],
            [['golongan'], 'string', 'max' => 5],
            [['jabatan'], 'string', 'max' => 50],
            [['nip','nama','pangkat','golongan','jabatan'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'nama' => 'Nama',
            'pangkat' => 'Pangkat',
            'golongan' => 'Golongan',
            'jabatan' => 'Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblKembaliAlats()
    {
        return $this->hasMany(TblKembaliAlat::className(), ['id_pengguna' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPinjamAlats()
    {
        return $this->hasMany(TblPinjamAlat::className(), ['id_pengguna' => 'nip']);
    }
}
