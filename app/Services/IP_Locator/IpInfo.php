<?php

namespace App\Services\IP_Locator;

use App\Contracts\IP_Locator;
use App\ServiceContainer\IP_Location;
use ipinfo\ipinfo\IPinfo as IpData;

class IpInfo implements IP_Locator
{
    public function locate(string $ip): IP_Location
    {
        $ipInfo = new IpData(config("ipinfo.access_token"));
        $details = $ipInfo->getDetails($ip);

        return new IP_Location($ip, $details->city, $details->country);
    }
}