<?php

namespace App\ServiceContainer;

class IP_Location
{
    private $ip;
    private $city;
    private $country;
    private $timezone;
    private $internetProvider;

    public function __construct($ip, $city, $country, $timezone, $internetProvider)
    {
        $this->ip = $ip;
        $this->city = $city;
        $this->country = $country;
        $this->timezone = $timezone;
        $this->internetProvider = $internetProvider;
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

    public function timezone()
    {
        return $this->timezone;
    }

    public function internetProvider()
    {
        return $this->internetProvider;
    }
}