<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detail_kembali_alat".
 *
 * @property integer $id
 * @property integer $id_kembali_alat
 * @property integer $id_alat
 * @property integer $banyak_alat
 * @property string $keterangan_alat
 * @property integer $tgl_balikin
 *
 * @property TblKembaliAlat $idKembaliAlat
 * @property TblAlat $idAlat
 */
class TblDetailKembaliAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detail_kembali_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kembali_alat', 'id_alat', 'banyak_alat', 'tgl_balikin'], 'integer'],
            [['keterangan_alat'], 'string', 'max' => 40],
            [['id_alat','banyak_alat'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    
    public function behaviors() {
        return
        [
            [
                'class'=>  \yii\behaviors\TimestampBehavior::className(),
                'attributes'=> [\yii\db\ActiveRecord::EVENT_BEFORE_INSERT =>'tgl_balikin'],
            
                        'value'=> new \yii\db\Expression('NOW()')
            ],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kembali_alat' => 'Id Kembali Alat',
            'id_alat' => 'Id Alat',
            'banyak_alat' => 'Banyak Alat',
            'keterangan_alat' => 'Keterangan Alat',
            'tgl_balikin' => 'Tgl Balikin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKembaliAlat()
    {
        return $this->hasOne(TblKembaliAlat::className(), ['id' => 'id_kembali_alat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlat()
    {
        return $this->hasOne(TblAlat::className(), ['id' => 'id_alat']);
    }
}
