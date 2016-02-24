<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_model_alat".
 *
 * @property integer $id
 * @property string $nama_model
 * @property integer $kat_id
 *
 * @property TblAlat[] $tblAlats
 * @property TblKatAlat $kat
 * @property TblPartAlat[] $tblPartAlats
 */
class TblModelAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_model_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kat_id'], 'integer'],
            [['nama_model'], 'string', 'max' => 20],
            [['kat_id','nama_model'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_model' => 'Nama Model',
            'kat_id' => 'Kat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAlats()
    {
        return $this->hasMany(TblAlat::className(), ['id_model_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKat()
    {
        return $this->hasOne(TblKatAlat::className(), ['id' => 'kat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPartAlats()
    {
        return $this->hasMany(TblPartAlat::className(), ['id_model_alat' => 'id']);
    }
    
    public function getModelbyID($jns_id)
    {
        $data = TblModelAlat::find()->where(['kat_id'=>$jns_id])->select(['id','nama_model as name'])->asArray()->all();
        $value = (count($data)==0) ? ['Tidak ada data'=>'Tidak Ada Data'] : $data;
        return $value;
    }
}
