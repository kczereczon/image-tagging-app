<?php

namespace App\Application\Actions\Image;

use App\Application\Actions\Action;
use App\Domain\Image\ImageRepository;
use Psr\Log\LoggerInterface;

abstract class ImageAction extends Action
{
    protected ImageRepository $imageRepository;

    public function __construct(LoggerInterface $logger, ImageRepository $imageRepository)
    {
        parent::__construct($logger);
        $this->imageRepository = $imageRepository;
    }
}