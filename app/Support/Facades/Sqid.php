<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string encode(int[] $numbers)
 * @method static int[] decode(string $id)
 */
class Sqid extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'sqid';
    }
}
