<?php

namespace App\Domain\Domain\Enums;

enum CheckMethod: string
{
    case GET = 'GET';
    case HEAD = 'HEAD';
}
