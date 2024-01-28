<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonModel extends Model
{
    public static function getResultFromJson($jsonString)
    {
        $dataArray = json_decode($jsonString, true);
        return $dataArray['radio-group-1705626849268-0'];
    }
}
