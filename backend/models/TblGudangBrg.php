<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_gudang_brg".
 *
 * @property integer $id
 * @property integer $id_brg
 * @property integer $jml_stok
 *
 * @property TblBarang $idBrg
 */
class TblGudangBrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_gudang_brg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_brg', 'jml_stok'], 'integer'],
            [['id_brg','jml_stok'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_brg' => 'Barang',
            'jml_stok' => 'Jumlah Stok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBrg()
    {
        return $this->hasOne(TblBarang::className(), ['id' => 'id_brg']);
    }
}
