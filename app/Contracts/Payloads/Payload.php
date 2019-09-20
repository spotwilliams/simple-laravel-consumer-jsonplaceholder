<?php

namespace App\Contracts\Payloads;

interface Payload
{
    public function getRawData(): array;
}
