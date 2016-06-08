<?php
    /**
     * Created by PhpStorm.
     * Company Anka Technologies <http://ankatechnologies.com>
     * User: TNChalise <tnchalise99@gmail.com>
     * Time: 1:06 PM
     */

    namespace app\controllers;

    use app\services\abstractions\ExampleInterface;
    use yii\base\Module;


    class ExampleController extends SiteController
    {

        /**
         * @var ExampleInterface
         */
        private $service;

        /**
         * ExampleController constructor.
         *
         * @param string           $id
         * @param Module           $module
         * @param array            $config
         * @param ExampleInterface $interface
         */
        public function __construct($id, Module $module, array $config = [], ExampleInterface $interface)
        {
            $this->service = $interface;

            return parent::__construct($id, $module, $config, $interface);
        }

        public function actionTypeHinter()
        {
            $someAction = $this->service->methodInfinity();

            dd($someAction);
        }
    }