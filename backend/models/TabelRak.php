<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tabel_rak".
 *
 * @property integer $id
 * @property string $nama_rak
 * @property string $row
 *
 * @property TblArsip[] $tblArsips
 */
class TabelRak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_rak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_rak', 'row'], 'string', 'max' => 20],
            [['nama_rak', 'row'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_rak' => 'Nama Rak',
            'row' => 'Row',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblArsips()
    {
        return $this->hasMany(TblArsip::className(), ['id_rak' => 'id']);
    }
}
