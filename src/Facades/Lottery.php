<?php
namespace Zclott\Lottery\Facades;
use Illuminate\Support\Facades\Facade;
class Lottery extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lottery';
    }
}