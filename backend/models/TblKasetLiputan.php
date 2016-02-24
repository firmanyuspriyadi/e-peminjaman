<?php

namespace backend\models;


use Yii;

/**
 * This is the model class for table "tbl_kaset_liputan".
 *
 * @property string $nomor_kaset
 * @property string $nm_kategori
 * @property string $input_date
 *
 * @property TabelDetailKaset[] $tabelDetailKasets
 * @property TblDetailFolder[] $tblDetailFolders
 */
class TblKasetLiputan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kaset_liputan';
    }

    /**
     * @inheritdoc
     */
    
    public function behaviors() {
        return[
            'timestamp'=>[
                'class'=> \yii\behaviors\TimestampBehavior::className(),
                'attributes'=>[
                \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'input_date'
                ],
                'value'=> new \yii\db\Expression('NOW()')
            ]
        ];
    }
    
    public function rules()
    {
        return [
            [['nomor_kaset'], 'required'],
            [['input_date'], 'safe'],
            [['nomor_kaset'], 'string', 'max' => 20],
            [['nm_kategori'], 'string', 'max' => 30],
            [['nomor_kaset'], 'unique'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_kaset' => 'Nomor Kaset',
            'nm_kategori' => 'Nama Kategori',
            'input_date' => 'Tanggal Terima',
          
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelDetailKasets()
    {
        return $this->hasMany(TabelDetailKaset::className(), ['nomor_kaset' => 'nomor_kaset']);
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailFolders()
    {
        return $this->hasMany(TblDetailFolder::className(), ['kaset_id' => 'nomor_kaset']);
    }
}
