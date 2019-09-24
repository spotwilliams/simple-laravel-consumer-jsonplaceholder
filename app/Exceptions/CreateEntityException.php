<?php

namespace App\Exceptions;

class CreateEntityException extends BizException
{
    public function __construct(string $entityName)
    {
        parent::__construct(trans("errors.$entityName.create"));
    }
}
