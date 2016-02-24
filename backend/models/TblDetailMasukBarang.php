<?php

namespace backend\models;


use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tbl_detail_masuk_barang".
 *
 * @property integer $id
 * @property integer $id_masuk_brg
 * @property integer $id_brg
 * @property string $satuan
 * @property integer $banyaknya
 * @property integer $tahun_pembelian
 * @property string $tgl_terima
 *
 * @property TblMskBrg $idMasukBrg
 * @property TblBarang $idBrg
 */
class TblDetailMasukBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const EVENT_AFTER_INSERT ='masuk-gudang';
    
    public function init()
    {
        $this->on(SELF::EVENT_AFTER_INSERT,[$this,'masukGudang']);
    }
    
    public function masukGudang($insert)
    {
        $new = TblGudangBrg::findOne($this->id_brg);
            if(isset($new))
            {
                $banyak = $new->jml_stok;
                $banyak += $this->banyaknya;
                $new->save();
                
            }else{
                $new2 = new TblGudangBrg([
                    'id_brg'=>$this->id_brg,
                    'jml_stok'=>$this->banyaknya
                ]);
            }
    }

    public static function tableName()
    {
        return 'tbl_detail_masuk_barang';
    }

    /**
     * @inheritdoc
     */
    
    public function behaviors() {
        return[
            'timestamp'=>[
                'class'=>  TimestampBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT => 'tgl_terima',
                ],
                'value'=> new Expression('NOW()'),
            ]
        ];
    }
    
    public function rules()
    {
        return [
            [['id_masuk_brg', 'id_brg', 'banyaknya', 'tahun_pembelian'], 'integer'],
            [['tgl_terima'], 'safe'],
            [['satuan'], 'string', 'max' => 20],
            [['id_brg','banyaknya','tahun_pembelian'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_masuk_brg' => 'Id Masuk Brg',
            'id_brg' => 'Barang',
            'satuan' => 'Satuan',
            'banyaknya' => 'Banyaknya',
            'tahun_pembelian' => 'Tahun Pembelian',
            'tgl_terima' => 'Tgl Terima',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMasukBrg()
    {
        return $this->hasOne(TblMskBrg::className(), ['id' => 'id_masuk_brg']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBrg()
    {
        return $this->hasOne(TblBarang::className(), ['id' => 'id_brg']);
    }
    
    public function getNamaBarang()
    {
        return ($this->idBrg) ? $this->idBrg->nm_brg : "none";
    }
    
    public function getSatuan()
    {
        return ($this->idBrg) ? $this->idBrg->idJnsBrg->satuan : "none";
    }
    
//    public function afterSave($insert, $changeAttributes)
//    {
//        if($this->isNewRecord)
//        {
//            //$gudang = new TblGudangBrg();
//            $new = TblGudangBrg::findOne($this->id_brg);
//            if(isset($new))
//            {
//                $banyak = $new->jml_stok;
//                $banyak += $this->banyaknya;
//                $new->save();
//                
//            }else{
//                $new2 = new TblGudangBrg([
//                    'id_brg'=>$this->id_brg,
//                    'jml_stok'=>$this->banyaknya
//                ]);
//            }
//        }
//        parent::afterSave($insert, $changedAttributes);
//    }
}
