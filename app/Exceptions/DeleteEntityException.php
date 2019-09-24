<?php

namespace App\Exceptions;

class DeleteEntityException extends BizException
{
    public function __construct(string $entityName)
    {
        parent::__construct(trans("errors.$entityName.delete"));
    }
}
