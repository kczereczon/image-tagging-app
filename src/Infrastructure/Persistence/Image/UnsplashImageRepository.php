<?php

namespace App\Infrastructure\Persistence\Image;

use App\Domain\Image\Image;
use App\Domain\Image\ImageRepository;
use Unsplash\HttpClient;
use Unsplash\Photo;

class UnsplashImageRepository implements ImageRepository
{
    public function __construct()
    {
        HttpClient::init([
            'applicationId' => 'MzGZbYnn_POifCFea3_VHTeT6klrSDIjGFcCHlrMYDA',
            'secret' => 'fi0uGWUmKXX8ewkhiUb6sA47RpjnJTrydowfziXlSrE',
            'utmSource' => 'Frilio'
        ]);
    }

    public function getImage(string $query): Image
    {
        $filters = [
            'query' => $query,
        ];

        $randomPhoto = Photo::random($filters)->toArray();

        return new Image((string)$randomPhoto['id'], (string)$randomPhoto['urls']['full']);
    }
}