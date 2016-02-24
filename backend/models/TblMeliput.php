<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_meliput".
 *
 * @property integer $id
 * @property integer $id_acara
 * @property integer $id_pinjam_alat
 *
 * @property TblAcara $idAcara
 * @property TblPinjamAlat $idPinjamAlat
 */
class TblMeliput extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_meliput';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_acara', 'id_pinjam_alat'], 'integer'],
            [['id_acara'],'required']
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_acara' => 'Acara',
            'id_pinjam_alat' => 'Id Pinjam Alat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAcara()
    {
        return $this->hasOne(TblAcara::className(), ['id' => 'id_acara']);
    }
    
    public function getNamaAcara()
    {
        return ($this->idAcara) ? $this->idAcara->nm_acara : 'none';
    }
    
    public function getTempat(){
        return ($this->idAcara) ? $this->idAcara->tmpt_acara : 'none';
    }
    
    public function getPukul(){
        return ($this->idAcara) ? $this->idAcara->jam_acara : 'none';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPinjamAlat()
    {
        return $this->hasOne(TblPinjamAlat::className(), ['id' => 'id_pinjam_alat']);
    }
}
