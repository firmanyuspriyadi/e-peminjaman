<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_detail_folder".
 *
 * @property integer $id
 * @property integer $folder_id
 * @property string $kaset_id
 *
 * @property TblFolder $folder
 * @property TblKasetLiputan $kaset
 */
class TblDetailFolder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_detail_folder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['folder_id'], 'integer'],
            [['kaset_id'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'folder_id' => 'Folder ID',
            'kaset_id' => 'Kaset ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFolder()
    {
        return $this->hasOne(TblFolder::className(), ['id' => 'folder_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKaset()
    {
        return $this->hasOne(TblKasetLiputan::className(), ['nomor_kaset' => 'kaset_id']);
    }
    
    public function getNomorKaset()
    {
        return ($this->getKaset()) ? $this->kaset->nomor_kaset : "none";
    }
    
    public function getKategori()
    {
        return ($this->getKaset()) ? $this->kaset->nm_kategori : "none";
    }
}
