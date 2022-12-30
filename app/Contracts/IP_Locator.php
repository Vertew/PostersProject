<?php

namespace App\Contracts;

use App\ServiceContainer\IP_Location;

interface IP_Locator
{
    public function locate(string $ip): IP_Location;
}