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

  Pratik\Slider\SliderServiceProvider::class,

]

#### step 3: Run  php artisan vendor:publish

#### step 4: Run  php artisan migrate

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
