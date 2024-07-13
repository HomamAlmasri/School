<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\Traits\ServiceProviderInjector;

class ServiceMakeCommand extends GeneratorCommand
{
   

    protected $signature = 'make:service {name}';
    protected $description = 'Create a new Service class';

   
    protected function getStub()
    {
        return __DIR__ . '/stubs/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Services';
    }
}