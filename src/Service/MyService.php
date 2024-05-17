<?php

namespace App\Service;

#[Autoconfigure]
class MyService
{
    public function doSomething(string $message): string
    {
        return strtoupper($message);
    }
}
