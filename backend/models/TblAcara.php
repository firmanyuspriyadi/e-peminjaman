<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_acara".
 *
 * @property integer $id
 * @property string $jns_acara
 * @property string $nm_acara
 * @property string $tgl_acara
 * @property string $jam_acara
 * @property string $tmpt_acara
 *
 * @property TabelDetailKaset[] $tabelDetailKasets
 * @property TblMeliput[] $tblMeliputs
 */
class TblAcara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_acara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jns_acara', 'nm_acara', 'tgl_acara', 'jam_acara', 'tmpt_acara'], 'required'],
            [['jns_acara'], 'string'],
            [['tgl_acara'], 'safe'],
            [['nm_acara'], 'string', 'max' => 255],
            [['jam_acara'], 'string', 'max' => 10],
            [['tmpt_acara'], 'string', 'max' => 30],
            [['jns_acara','nm_acara','tgl_acara','jam_acara','tmpt_acara'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jns_acara' => 'Jenis Acara',
            'nm_acara' => 'Nama Acara',
            'tgl_acara' => 'Tanggal Acara',
            'jam_acara' => 'Jam Acara',
            'tmpt_acara' => 'Tempat Acara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelDetailKasets()
    {
        return $this->hasMany(TabelDetailKaset::className(), ['id_acara' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMeliputs()
    {
        return $this->hasMany(TblMeliput::className(), ['id_acara' => 'id']);
    }
}
