<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tabel_detail_retur".
 *
 * @property integer $id
 * @property integer $id_retur
 * @property integer $id_barang
 * @property integer $bnyk_kmbl
 * @property string $keterangan
 *
 * @property TblRetur $idRetur
 * @property TblBarang $idBarang
 */
class TabelDetailRetur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_detail_retur';
    }

    /**
     * @inheritdoc
     */
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if($insert)
        {
            $id = Yii::$app->request->post('TabelDetailRetur');
            foreach($id as $ids){
                $posted = $ids['id_barang'];
                $barang = TblGudangBrg::findOne(['id_brg'=>$posted]);
                $barang->jml_stok += $this->bnyk_kmbl;
                $barang->save();
            }
            
        }
    }
    
    public function rules()
    {
        return [
            [['id_retur', 'id_barang', 'bnyk_kmbl'], 'integer'],
            [['keterangan'], 'string', 'max' => 30],
            [['keterangan','id_barang','bnyk_kmbl'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_retur' => 'Id Retur',
            'id_barang' => 'Barang',
            'bnyk_kmbl' => 'Banyak Kembali',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRetur()
    {
        return $this->hasOne(TblRetur::className(), ['id' => 'id_retur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarang()
    {
        return $this->hasOne(TblBarang::className(), ['id' => 'id_barang']);
    }
}
