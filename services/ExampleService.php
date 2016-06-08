<?php

    namespace app\services;

    use app\services\abstractions\ExampleInterface;

    /**
     * Created by PhpStorm.
     * Company Anka Technologies <http://ankatechnologies.com>
     * User: TNChalise <tnchalise99@gmail.com>
     * Time: 1:01 PM
     */
    class ExampleService implements ExampleInterface
    {
        /**
         * Description: Some Doc Block.
         *
         * @return mixed
         */
        public function methodOne()
        {
            return 'Executed from ' . __METHOD__;
        }

        /**
         * Description: Some Doc Block.
         *
         * @return mixed
         */
        public function methodInfinity()
        {
            return 'Executed from ' . __METHOD__;
        }
    }