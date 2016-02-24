<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_retur".
 *
 * @property integer $id
 * @property string $nmr_minta
 * @property integer $jumlah_kmbl
 * @property string $tgl_kembali
 *
 * @property TabelDetailRetur[] $tabelDetailReturs
 * @property TblMintaBhnBaku $nmrMinta
 */
class TblRetur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_retur';
    }
    
    public function behaviors() {
        return [
            [
                'class'=>  \yii\behaviors\TimestampBehavior::className(),
                'attributes'=>[
                \yii\db\ActiveRecord::EVENT_BEFORE_INSERT =>'tgl_kembali'
                ],
                'value'=> new \yii\db\Expression('NOW()')
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah_kmbl'], 'integer'],
            [['tgl_kembali'], 'safe'],
            [['nmr_minta'], 'string', 'max' => 255],
            [['nmr_minta','jumlah_kmbl'],'required']
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
            'jumlah_kmbl' => 'Jumlah Kembali',
            'tgl_kembali' => 'Tanggal Kembali',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelDetailReturs()
    {
        return $this->hasMany(TabelDetailRetur::className(), ['id_retur' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNmrMinta()
    {
        return $this->hasOne(TblMintaBhnBaku::className(), ['nmr_minta' => 'nmr_minta']);
    }
}
