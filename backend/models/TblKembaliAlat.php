<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\TblPengguna;

/**
 * This is the model class for table "tbl_kembali_alat".
 *
 * @property integer $id
 * @property integer $id_pinjam
 * @property integer $tgl_balikin
 * @property integer $id_user
 * @property string $id_pengguna
 *
 * @property TblDetailKembaliAlat[] $tblDetailKembaliAlats
 * @property TblPinjamAlat $idPinjam
 * @property User $idUser
 * @property TblPengguna $idPengguna
 */
class TblKembaliAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kembali_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pinjam', 'tgl_balikin', 'id_user'], 'integer'],
            [['id_pengguna'], 'string', 'max' => 25],
            [['id_pinjam', 'id_pengguna'],'required']
            
        ];
    }
    
    public function behaviors(){
        return 
        [
            [
                'class'=>  \yii\behaviors\TimestampBehavior::className(),
                'attributes'=> [
                \yii\db\ActiveRecord::EVENT_BEFORE_INSERT =>'tgl_balikin'
                ],
                'value'=> new \yii\db\Expression('NOW()')
            ],
            [
                'class'=> \yii\behaviors\BlameableBehavior::className(),
                'attributes'=>[
                \yii\db\ActiveRecord::EVENT_BEFORE_INSERT =>'id_user'
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pinjam' => 'Kode Pinjam',
            'tgl_balikin' => 'Tanggal Kembali',
            'id_user' => 'Petugas',
            'id_pengguna' => 'Peminjam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailKembaliAlats()
    {
        return $this->hasMany(TblDetailKembaliAlat::className(), ['id_kembali_alat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPinjam()
    {
        return $this->hasOne(TblPinjamAlat::className(), ['id' => 'id_pinjam']);
    }
    
    public function getKeperluan(){
        return $this->idPinjam ? $this->idPinjam->keperluan : 'no data';
    }
    
    public function getTglPinjam(){
        return $this->idPinjam ? $this->idPinjam->tgl_pinjam : 'no data';
    }
    
       /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPengguna()
    {
        return $this->hasOne(TblPengguna::className(), ['nip' => 'id_pengguna']);
    }
    
    public function getPengguna(){
        return $this->idPengguna ? $this->idPengguna->nama : 'no data';
    }
}
