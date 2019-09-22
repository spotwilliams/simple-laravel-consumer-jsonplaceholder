<?php

namespace App\Exceptions;

class EntityNotFoundException extends BizException
{
    public function __construct(string $entityName)
    {
        parent::__construct(trans("errors.$entityName.not-found"));
    }
}
