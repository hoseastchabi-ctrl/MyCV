<?php

namespace App\Enums;

enum DegreeType: string
{
    case Certificate = 'certificate';
    case Diploma = 'diploma';
    case Associate = 'associate';
    case Bachelor = 'bachelor';
    case Master = 'master';
    case Doctorate = 'doctorate';
    case Other = 'other';
}