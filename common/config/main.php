<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
       
        
        'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',

            // format settings for displaying each date attribute
            'displaySettings' => [
           
             \kartik\datecontrol\Module::FORMAT_DATE =>'dd-mm-YYYY',
             \kartik\datecontrol\Module::FORMAT_TIME => 'HH:mm:ss a',
                \kartik\datecontrol\Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss a', 
            ],

            // format settings for saving each date attribute
            'saveSettings' => [
                \kartik\datecontrol\Module::FORMAT_DATE =>'dd-mm-YYYY',
                \kartik\datecontrol\Module::FORMAT_TIME => 'HH:mm:ss a',
                \kartik\datecontrol\Module::FORMAT_DATETIME => 'dd-MM-yyyy HH:mm:ss a', 
            ],



            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
    ],
    
];
