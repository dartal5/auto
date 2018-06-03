<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3f1f591bda07d056ca304b6077643909
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Session\\' => 8,
        ),
        'R' => 
        array (
            'Run\\' => 4,
            'RedBeanPHP\\' => 11,
        ),
        'P' => 
        array (
            'Payment\\' => 8,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Main\\' => 5,
            'Mail\\' => 5,
        ),
        'F' => 
        array (
            'Form\\' => 5,
        ),
        'D' => 
        array (
            'Database\\' => 9,
        ),
        'C' => 
        array (
            'Complete\\' => 9,
            'Code\\' => 5,
            'Calculator\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Session\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Session',
        ),
        'Run\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
        'Payment\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Main/Payment',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Main\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Main',
        ),
        'Mail\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Mail',
        ),
        'Form\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Main/Form',
        ),
        'Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Database',
        ),
        'Complete\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Main/Complete',
        ),
        'Code\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Main/Code',
        ),
        'Calculator\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Main/Calculator',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3f1f591bda07d056ca304b6077643909::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3f1f591bda07d056ca304b6077643909::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
