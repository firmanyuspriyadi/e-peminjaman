<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

class ValueHelper{
    
    public static function getAcaraFree(){
        $meliput = TblMeliput::find()->select('id_acara');
        $acara = TblAcara::find()
                ->where(['NOT IN', 'id',$meliput])
                ->all();        
        return $acara[$acara];
    }    
}

