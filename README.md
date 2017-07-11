# laravel Slider
Laravel 5.4 Image Slider

## Following are the step to configure Image Slider


#### Step 1:copy vendor using composer

    composer require pratik007kumar/slider:"dev-master"
    
    or
    
    "require": {
       
        "pratik007kumar/slider": "dev-master"
    }
    composer update

#### step 2: Copy providers to config/app.php

'providers' => [
 // ...
  Collective\Html\HtmlServiceProvider::class,
  Pratik\Slider\SliderServiceProvider::class,
  Barryvdh\Elfinder\ElfinderServiceProvider::class,
 // ...

]


'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
      'Input' => Illuminate\Support\Facades\Input::class,

    // ...
  ],

#### step 3: Run  
	php artisan vendor:publish
#### step 4: Run 
	php artisan elfinder:publish

#### step 5: Run  
	php artisan migrate
#### step 6: create public/uploads folder  and set permission 0777

#### step 7: Copy following array in config/elfinder.php
	'dir' => ['uploads'],
    'route' => [
        'prefix' => 'elfinder',
        'middleware' => ['web', 'auth'], //Set to null to disable middleware filter
    ],
    'roots' => array(
        array(
            'driver' => 'LocalFileSystem',
            'path'   => __DIR__.'/../public/uploads', 
            'URL'    => './../../uploads', // <-- That dir should be same as above, in path
            'attributes' => array(
                array( 
                    'pattern' => '/\/\./',
                    'read' => false,
                    'write' => false,
                    'locked' => true,
                    'hidden' => true
                )
            )
        )
    ),
    'options' => array(
        'accessControl' => 'access',
        'uploadAllow' => ['image'],
        'mimeDetect' => 'internal',
        'imgLib'     => 'gd',
        'uploadOrder'=> ['allow', 'deny'],
        'tmbPath' => '.tmb'
        ),


This packager Required Auth login
if you don't have Auth login 

	php artisan:make auth

#### you can view laravel slider with following link:
www.yourdomain.com/slider 
or 
localhost/yourapp/slider

#### Demo

![All Slider Page](/../master/src/public/images/demo1.png?raw=true "All Slider Page")
![Create Slider Page](/../master/src/public/images/demo2.png?raw=true "Create Slider Page")
![Slider Preview Page](/../master/src/public/images/demo3.png?raw=true "Slider Preview Page")
