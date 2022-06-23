<?php

namespace App\Infrastructure\Persistence\Image;

use App\Application\Settings\SettingsInterface;
use App\Domain\Image\Image;
use App\Domain\Image\ImageRepository;
use Unsplash\HttpClient;
use Unsplash\Photo;

class UnsplashImageRepository extends ImageRepository
{
    public function __construct(SettingsInterface $settings)
    {
        HttpClient::init([
            'applicationId' => $settings->get('unsplashApplicationId'),
            'secret' => $settings->get('unsplashSecret'),
            'utmSource' => $settings->get('unsplashUtmSource')
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

    public function saveImage(Image $image)
    {
        file_put_contents(
            __DIR__ . '/../../../../output/photos/' . $image->getId() . pathinfo(
                $image->getId(),
                PATHINFO_EXTENSION
            ),
            file_get_contents($image->getUrl())
        );
    }
}
