<?php
declare(strict_types=1);

namespace App\Domain\Image;

use App\Application\Settings\Settings;

interface ImageRepository
{
    public function getImage(string $query): Image;
}