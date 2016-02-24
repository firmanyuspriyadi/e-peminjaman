<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tbl_msk_brg".
 *
 * @property integer $id
 * @property integer $jml_msk
 * @property string $tgl_msk
 *
 * @property TblDetailMasukBarang[] $tblDetailMasukBarangs
 */
class TblMskBrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_msk_brg';
    }

    /**
     * @inheritdoc
     */
    
    public function behaviors() {
        return[
            'timestamp'=>[
                'class'=>  TimestampBehavior::className(),
                'attributes'=>[
                        ActiveRecord::EVENT_BEFORE_INSERT=> 'tgl_msk',
                    ],
                'value'=> new Expression('NOW()')
            ]
        ];
    }
    
    public function rules()
    {
        return [
            [['jml_msk'], 'integer'],
            [['tgl_msk'], 'safe'],
            [['jml_msk'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jml_msk' => 'Jumlah Masuk',
            'tgl_msk' => 'Tanggal Masuk Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailMasukBarangs()
    {
        return $this->hasMany(TblDetailMasukBarang::className(), ['id_masuk_brg' => 'id']);
    }
}
