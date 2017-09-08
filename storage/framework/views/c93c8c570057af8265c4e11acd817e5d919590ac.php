<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat Blue Team</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="<?php echo e(asset('css/error.css')); ?>" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height content-page-error">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Chat Blue Team
                </div>

                <div style="font-size: 60px;">
                    Welcome to blue team!
                    <?php if(Auth::check()): ?>
                    <br>
<<<<<<< HEAD:storage/framework/views/fc9023a281d03d05db85db6edc6c8ab0c733085f.php
                    <!-- <a href="<?php echo e(route('home')); ?>" style="text-decoration: none;">Go back</a> -->
=======
                    <a href="<?php echo e(route('home')); ?>" style="text-decoration: none;">Continue</a>
                    <?php endif; ?>
>>>>>>> 9f135bd81a1be6599f030874b1a3f63e02c63973:storage/framework/views/c93c8c570057af8265c4e11acd817e5d919590ac.php
                </div>
            </div>
        </div>
    </body>
</html>
