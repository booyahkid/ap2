<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JsonModel;

class JsonController extends Controller
{
    public function showData()
    {
        $jsonString = '{"radio-group-1705626849268-0":"option-1"}';
        $result = JsonModel::getResultFromJson($jsonString);

        return view('json.show', compact('result'));
    }
}
