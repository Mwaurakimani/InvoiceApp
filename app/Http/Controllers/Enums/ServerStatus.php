<?php

namespace App\Http\Controllers\Enums;

enum ServerStatus: string
{
    case Start = 'Start';
    case Pause = 'Pause';
    case Resume = 'Resume';
    case End = 'End';
}
