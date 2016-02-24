<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_kat_alat".
 *
 * @property integer $id
 * @property string $kat_alat
 *
 * @property TblAlat[] $tblAlats
 * @property TblModelAlat[] $tblModelAlats
 * @property TblPartAlat[] $tblPartAlats
 */
class TblKatAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kat_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kat_alat'], 'required'],
            [['kat_alat'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kat_alat' => 'Kategori Alat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAlats()
    {
        return $this->hasMany(TblAlat::className(), ['id_kat_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblModelAlats()
    {
        return $this->hasMany(TblModelAlat::className(), ['kat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPartAlats()
    {
        return $this->hasMany(TblPartAlat::className(), ['id_kat_alat' => 'id']);
    }
}
