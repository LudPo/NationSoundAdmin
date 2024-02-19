<?php

namespace App\DTO;

class ArtistDTO
{
    public $artistName;
    public $excerpt;
    public $description;
    public $slug;
    public $imageUrls = [];

    public function __construct($artistName, $excerpt, $description, $slug, array $imageUrls)
    {
        $this->artistName = $artistName;
        $this->excerpt = $excerpt;
        $this->description = $description;
        $this->slug = $slug;
        $this->imageUrls = $imageUrls;
    }
}
