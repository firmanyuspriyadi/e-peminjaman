<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_minta_bhn_baku".
 *
 * @property string $nmr_minta
 * @property string $keperluan
 * @property integer $banyak
 * @property string $tgl_minta
 * @property string pemohon
 *
 * @property TblDetailMinta[] $tblDetailMintas
 * @property TblRetur[] $tblReturs
 */
class TblMintaBhnBaku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
   


    public static function tableName()
    {
        return 'tbl_minta_bhn_baku';
    }
    
      /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nmr_minta'], 'required'],
            ['nmr_minta','unique','targetAttribute'=>['nmr_minta'],'message'=>'Nomor tidak boleh sama'],
            [['banyak'], 'integer'],
            [['tgl_minta'], 'safe'],
            [['nmr_minta'], 'string', 'max' => 255],
            [['keperluan'], 'string', 'max' => 50],
            [['pemohon'],'string','max'=>20],
            [['nmr_minta','keperluan','banyak'],'required']
        ];
    }
    
    public function behaviors() 
    {
        return[
            [
                'class'=> \yii\behaviors\TimestampBehavior::className(),
                'attributes'=>
                [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'tgl_minta'
                ],
                'value'=> new \yii\db\Expression('NOW()')
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nmr_minta' => 'Nomor Permintaan',
            'keperluan' => 'Keperluan',
            'banyak' => 'Banyak',
            'tgl_minta' => 'Tanggal Permintaan',
            'pemohon'=>'Pemohon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailMintas()
    {
        return $this->hasMany(TblDetailMinta::className(), ['nmr_minta' => 'nmr_minta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblReturs()
    {
        return $this->hasMany(TblRetur::className(), ['nmr_minta' => 'nmr_minta']);
    }
}
