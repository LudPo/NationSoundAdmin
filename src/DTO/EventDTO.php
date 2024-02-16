<?php

namespace App\DTO;

class EventDTO
{
    public $id;
    public $artist; //instance of ArtistDTO
    public $musicalGenre;
    public $startDate;
    public $endDate;
    public $stage;

    public function __construct($id, $artist, $musicalGenre, $startDate, $endDate, $stage)
    {
        $this->id = $id;
        $this->artist = $artist;
        $this->musicalGenre = $musicalGenre;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->stage = $stage;
    }
}
