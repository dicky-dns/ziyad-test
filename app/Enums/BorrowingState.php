<?php

namespace App\Enums;

enum BorrowingState: string
{
    case BORROWED = 'borrowed';
    case RETURNED = 'returned';
}
