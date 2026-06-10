<?php

namespace App\Enums;

enum MessageStatus: string
{
    case Unseen = 'unseen';
    case Seen   = 'seen';
}
