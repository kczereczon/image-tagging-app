<?php

namespace App\Application\Actions\Image;

use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\Image\Image;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class TagImageAction extends ImageAction
{

    protected function action(): Response
    {
        $label = $this->request->getParsedBody()['label'];
        $url = $this->request->getParsedBody()['url'];
        $id = $this->request->getParsedBody()['id'];

        $image = new Image($id, $url);

        $this->imageRepository->addImageToDataset($image, 1, $label);

        return $this->redirect('/image?query=' . $label);
    }
}