<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_pejabat".
 *
 * @property string $nip
 * @property string $nama
 * @property string $jabatan
 *
 * @property TblPinjamAlat[] $tblPinjamAlats
 */
class TblPejabat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pejabat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['nip'], 'string', 'max' => 25],
            [['nama'], 'string', 'max' => 30],
            [['jabatan'], 'string', 'max' => 100],
            [['nip','nama','jabatan'],'required']
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
            'jabatan' => 'Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPinjamAlats()
    {
        return $this->hasMany(TblPinjamAlat::className(), ['id_pejabat' => 'nip']);
    }
}
