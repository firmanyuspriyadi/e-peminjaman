<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_arsip".
 *
 * @property integer $id
 * @property integer $id_folder
 * @property integer $id_rak
 * @property string $keterangan
 * @property string $input_date
 *
 * @property TblFolder $idFolder
 * @property TabelRak $idRak
 */
class TblArsip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_arsip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_folder', 'id_rak'], 'integer'],
            [['input_date'], 'safe'],
            [['keterangan'], 'string', 'max' => 40],
            [['id_folder','id_rak','input_date','keterangan'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_folder' => 'Folder',
            'id_rak' => 'Rak',
            'keterangan' => 'Keterangan',
            'input_date' => 'Input Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFolder()
    {
        return $this->hasOne(TblFolder::className(), ['id' => 'id_folder']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRak()
    {
        return $this->hasOne(TabelRak::className(), ['id' => 'id_rak']);
    }
}
