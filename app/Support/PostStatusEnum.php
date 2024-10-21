<?php

namespace App\Support;

enum PostStatusEnum: int
{
    case DRAFT = 1;
    case PUBLISHED = 2;
    case ARCHIVED = 3;
}