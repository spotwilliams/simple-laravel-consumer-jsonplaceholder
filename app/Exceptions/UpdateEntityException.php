<?php

namespace App\Exceptions;

class UpdateEntityException extends BizException
{
    public function __construct(string $entityName)
    {
        parent::__construct(trans("errors.$entityName.update"));
    }
}
