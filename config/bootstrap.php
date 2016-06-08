<?php
    /**
     * Created by PhpStorm.
     * Company Anka Technologies <http://ankatechnologies.com>
     * User: TNChalise <tnchalise99@gmail.com>
     * Time: 12:56 PM
     */

    use Yii;

    require_once 'dependencies.php';

    // Resolve dependencies. $dependencies is defined in dependencies.php
    foreach ($dependencies as $dependency => $resolver) {
        Yii::$container->set($dependency, $resolver);
    }

    /**
     * Description: Dump and die.
     *
     * @param $var
     */
    function dd($var)
    {
        echo "<pre>";
        \yii\helpers\VarDumper::dump($var);
        exit;
    }