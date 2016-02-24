<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tabel_detail_kaset".
 *
 * @property integer $id
 * @property string $nomor_kaset
 * @property integer $id_acara
 *
 * @property TblAcara $idAcara
 * @property TblKasetLiputan $nomorKaset
 */
class TabelDetailKaset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_detail_kaset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_acara'], 'integer'],
            [['nomor_kaset'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor_kaset' => 'Nomor Kaset',
            'id_acara' => 'Acara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAcara()
    {
        return $this->hasOne(TblAcara::className(), ['id' => 'id_acara']);
    }
    
    public function getNamaAcara(){
        return ($this->idAcara) ? $this->idAcara->nm_acara : 'none';
    }
    
    public function getJamAcara(){
        return ($this->idAcara) ? $this->idAcara->jam_acara : 'none';
    }
    
    public function getTempatAcara(){
        return ($this->idAcara) ? $this->idAcara->tmpt_acara : 'none';
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNomorKaset()
    {
        return $this->hasOne(TblKasetLiputan::className(), ['nomor_kaset' => 'nomor_kaset']);
    }
}
