<?php

namespace App\Application\Actions\Image;

use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\Image\QueryMissingException;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class ViewImageAction extends ImageAction
{
    /**
     * @throws QueryMissingException
     */
    protected function action(): Response
    {
        $query = $this->request->getQueryParams()['query'] ?? null;

        if (!$query) {
            throw new QueryMissingException();
        }

        $image = $this->imageRepository->getImage($query);
        return $this->render('test.html', ['imageUrl' => $image->getUrl(), 'query' => $query]);
    }
}
