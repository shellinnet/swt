<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=hdm121115553.my3w.com;dbname=hdm121115553_db',
            'username' => 'hdm121115553',
            'password' => 'swt62899308swt',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,    //这里一定要改成false，不然邮件不会发送
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => '315711862@qq.com',
                'password' => 'linda1221',        //如果是163邮箱，此处要填授权码
                'port' => '25',
                'encryption' => 'tls',
                 ],
            ],
    ],
 ];
