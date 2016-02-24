<?php

namespace backend\models;


use Yii;
use yii\base\Event;
use backend\models\TblGudangBrg;

/**
 * This is the model class for table "tbl_detail_minta".
 *
 * @property integer $id
 * @property string $nmr_minta
 * @property integer $id_barang
 * @property string $satuan
 * @property integer $banyak_minta
 * @property string $tgl_minta
 * @property string $keterangan
 *
 * @property TblBarang $idBarang
 * @property TblMintaBhnBaku $nmrMinta
 */
class TblDetailMinta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if ($insert)
        {
            $id = Yii::$app->request->post('TblDetailMinta');
            foreach($id as $ids)
            {
                $posted = $ids['id_barang'];
                $kurang = TblGudangBrg::findOne(['id_brg'=>$posted]);
                $kurang->jml_stok -=$this->banyak_minta;
                $kurang->save();
            }           
        }
    }
 

    public static function tableName()
    {
        return 'tbl_detail_minta';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang', 'banyak_minta'], 'integer'],
            [['tgl_minta'], 'safe'],
            [['nmr_minta'], 'string', 'max' => 255],
            [['satuan'], 'string', 'max' => 20],
            [['keterangan'], 'string', 'max' => 40],
            [['id_barang','banyak_minta','keterangan'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nmr_minta' => 'Nomor Permintaan',
            'id_barang' => 'Barang',
            'satuan' => 'Satuan',
            'banyak_minta' => 'Banyak Permintaan',
            'tgl_minta' => 'Tgl Minta',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarang()
    {
        return $this->hasOne(TblBarang::className(), ['id' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNmrMinta()
    {
        return $this->hasOne(TblMintaBhnBaku::className(), ['nmr_minta' => 'nmr_minta']);
    }
}
