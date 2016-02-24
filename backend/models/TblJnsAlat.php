<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_jns_alat".
 *
 * @property integer $id
 * @property string $merk
 *
 * @property TblAlat[] $tblAlats
 * @property TblPartAlat[] $tblPartAlats
 */
class TblJnsAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jns_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merk'], 'string', 'max' => 30],
            [['merk'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merk' => 'Merk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAlats()
    {
        return $this->hasMany(TblAlat::className(), ['id_jns_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPartAlats()
    {
        return $this->hasMany(TblPartAlat::className(), ['id_jns_alat' => 'id']);
    }
}
