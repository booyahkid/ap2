<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;


class FormController extends Controller
{
    public function showForms()
    {
        $formDataList = Form::whereIn('id', [9, 10])->get();

        return view('form.show', ['formDataList' => $formDataList]);
    }
}
