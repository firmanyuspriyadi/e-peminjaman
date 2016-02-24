<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_folder".
 *
 * @property integer $id
 * @property string $nama_folder
 * @property string $bulan
 * @property integer $tahun *  
 * @property TblArsip[] $tblArsips
 */
class TblFolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_folder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun'], 'integer'],
            [['nama_folder', 'bulan'], 'string', 'max' => 20],
            [['nama_folder','bulan','tahun'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_folder' => 'Nama',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblArsips()
    {
        return $this->hasMany(TblArsip::className(), ['id_folder' => 'id']);
    }
}
