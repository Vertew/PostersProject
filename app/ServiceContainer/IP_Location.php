<?php

namespace App\ServiceContainer;

class IP_Location
{
    private $ip;
    private $city;
    private $country;

    public function __construct($ip, $city, $country)
    {
        $this->ip = $ip;
        $this->city = $city;
        $this->country = $country;
    }

    public function ip()
    {
        return $this->ip;
    }

    public function city()
    {
        return $this->city;
    }

    public function country()
    {
        return $this->country;
    }
}