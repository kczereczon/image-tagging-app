<?php
declare(strict_types=1);

namespace App\Domain\Image;

interface ImageRepository
{
    public function getImage(string $query): Image;
}