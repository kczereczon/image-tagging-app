<?php

namespace App\Domain\Image;

use App\Domain\DomainException\DomainException;

class QueryMissingException extends DomainException
{
    protected $message = 'Query missing';
}
