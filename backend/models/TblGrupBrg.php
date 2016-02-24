<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_grup_brg".
 *
 * @property integer $id
 * @property string $kategori
 *
 * @property TblBarang[] $tblBarangs
 * @property TblKatBrg[] $tblKatBrgs
 */
class TblGrupBrg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_grup_brg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategori'], 'string', 'max' => 30],
            [['kategori'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBarangs()
    {
        return $this->hasMany(TblBarang::className(), ['id_grup_brg' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblKatBrgs()
    {
        return $this->hasMany(TblKatBrg::className(), ['id_grup_brg' => 'id']);
    }
}
