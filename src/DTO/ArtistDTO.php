<?php

namespace App\DTO;

class ArtistDTO
{
    public $artistName;
    public $excerpt;
    public $description;
    public $imageUrls = [];

    public function __construct($artistName, $excerpt, $description, array $imageUrls)
    {
        $this->artistName = $artistName;
        $this->excerpt = $excerpt;
        $this->description = $description;
        $this->imageUrls = $imageUrls;
    }
}
