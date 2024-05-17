<?php

namespace App\Service;

use App\Interfaces\GreeterInterface;

class Greeter implements GreeterInterface
{
    public function greet(string $name): string
    {
        return "Hello, $name!"; // Your greeting logic
    }
}