<?php

namespace App\DTO;

class LocationDTO
{
    public $id;
    public $locationName;
    public $locationCategory;
    public $latitude;
    public $longitude;
    public $locationIcon;

    public function __construct($id, $locationName, $locationCategory, $latitude, $longitude,$locationIcon)
    {
        $this->id = $id;
        $this->locationName = $locationName;
        $this->locationCategory = $locationCategory;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->locationIcon = $locationIcon;
    }
}
