# yii2-dependency-injection
A basic application structure with the dependency injection container for yii2 basic application. This is acheived by doing the same for advanced application structure also.

## Basic Setups
Look into [ExampleController] (https://github.com/TNChalise/yii2-dependency-injection/blob/master/controllers/ExampleController.php), in its construct method, we are telling you to inject dependencies for [ExampleInterface] (https://github.com/TNChalise/yii2-dependency-injection/blob/master/services/abstractions/ExampleInterface.php) whose actual implementation is [ExampleService] (https://github.com/TNChalise/yii2-dependency-injection/blob/master/services/ExampleService.php).

### ExampleController.php
```php
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
        
        // GET example/type-hinter
        public function actionTypeHinter()
        {
            $someAction = $this->service->methodInfinity();

            dd($someAction);
        }
    }
  ```

We need to tell Yii2 to resolve dependency automatically, for this please look into [bootstrap.php](https://github.com/TNChalise/yii2-dependency-injection/blob/master/config/bootstrap.php) and [dependencies.php](https://github.com/TNChalise/yii2-dependency-injection/blob/master/config/dependencies.php). And include bootstrap.php in your main.php/[web.php](https://github.com/TNChalise/yii2-dependency-injection/blob/master/config/web.php) file.

###dependencies.php
```php
   $dependencies = [
        'app\services\abstractions\ExampleInterface' =>
            'app\services\ExampleService'
    ];
    
```
###bootstrap.php
```php
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
    
```
###web.php
```php
  <?php

    $params = require(__DIR__ . '/params.php');
    require_once 'bootstrap.php';

    $config = [
        'id'         => 'basic',
        ...
    
```
