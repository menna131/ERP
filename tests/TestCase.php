<?php

namespace Tests;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Str;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    //  // Our codebase is structured by domain, so our models live
    // // in nested directories rather than App/Models e.g.

    // // App/Domain/Posts/Models/Post
    // // App/Domain/Posts/Models/Comment

    // public function setUp(): void
    // {
    //     parent::setUp();

    //     Factory::guessFactoryNamesUsing(function (string $modelName) {
    //         // We can also customise where our factories live too if we want:
    //         $namespace = 'Stocks\\Database\\Factories\\';

    //         // Here we are getting the model name from the class namespace
    //         $modelName = Str::afterLast($modelName, '\\');

    //         // Finally we'll build up the full class path where
    //         // Laravel will find our model factory
    //         return $namespace.$modelName.'Factory';
    //     });
    // }
}
