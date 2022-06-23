<?php

declare(strict_types=1);

namespace App\Domain\Image;

use App\Application\Settings\Settings;

abstract class ImageRepository
{
    abstract public function getImage(string $query): Image;
    abstract public function saveImage(Image $image);

    public function addImageToDataset(Image $image, float $confidence, string $label)
    {
        $this->saveImage($image);

        $file = __DIR__ . '/../../../output/dataset.csv';
        $handle = fopen($file, 'a');

        $line = $image->jsonSerialize();
        fputcsv($handle, $line);

        fclose($handle);
    }
}
