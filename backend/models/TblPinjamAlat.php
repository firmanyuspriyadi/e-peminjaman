<?php

namespace backend\models;
use common\models\User;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "tbl_pinjam_alat".
 *
 * @property integer $id
 * @property string $tgl_pinjam
 * @property integer $jml_pinjam
 * @property string $keperluan
 * @property integer $id_user
 * @property string $id_pejabat
 * @property string $id_pengguna
 * @property string $status_pinjaman
 *
 * @property TblDetailPinjamAlat[] $tblDetailPinjamAlats
 * @property TblKembaliAlat[] $tblKembaliAlats
 * @property TblMeliput[] $tblMeliputs
 * @property User $idUser
 * @property TblPejabat $idPejabat
 * @property TblPengguna $idPengguna
 */
class TblPinjamAlat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pinjam_alat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl_pinjam'], 'safe'],
            [['jml_pinjam', 'id_user'], 'integer'],
            [['status_pinjaman'], 'string'],
            [['keperluan'], 'string', 'max' => 50],
            [['id_pejabat', 'id_pengguna'], 'string', 'max' => 25],
            ['status_pinjaman','default', 'value'=>'Dipinjam'],
            [['jml_pinjam','keperluan','id_user','id_pejabat','id_pengguna'],'required']
        ];
    }
    
    public function behaviors() {
       return[
          [
               'class'=>  BlameableBehavior::className(),
                'attributes'=>[
                \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'id_user',
                ]           
              
           ],
           [
              'class'=>  \yii\behaviors\TimestampBehavior::className(),
              'attributes'=>[
              \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'tgl_pinjam'
              ],
              'value'=> new \yii\db\Expression('NOW()')
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
            'tgl_pinjam' => 'Tanggal Pinjam',
            'jml_pinjam' => 'Jumlah Pinjam',
            'keperluan' => 'Keperluan',
            'id_user' => 'Petugas',
            'id_pejabat' => 'Pejabat',
            'id_pengguna' => 'Peminjam',
            'status_pinjaman' => 'Status Pinjaman',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDetailPinjamAlats()
    {
        return $this->hasMany(TblDetailPinjamAlat::className(), ['id_pinjam' => 'id']);
    }
    
   

    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblKembaliAlats()
    {
        return $this->hasMany(TblKembaliAlat::className(), ['id_pinjam' => 'id']);
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMeliputs()
    {
        return $this->hasMany(TblMeliput::className(), ['id_pinjam_alat' => 'id']);
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
    public function getIdPejabat()
    {
        return $this->hasOne(TblPejabat::className(), ['nip' => 'id_pejabat']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPengguna()
    {
        return $this->hasOne(TblPengguna::className(), ['nip' => 'id_pengguna']);
    }
    
    public static function getPejabat(){
        return ($this->idPejabat) ? $this->idPejabat->nama : 'none';
    }
    
    public static function getUser(){
        return ($this->idUser) ? $this->idUser->username : 'none';
    }
    
    public static function getJabatan(){
        return $this->idPejabat->jabatan ;
    }
    
    public static function getPengguna(){
        return ($this->idPengguna) ? $this->idPengguna->nama : 'none';
    }
    
}
