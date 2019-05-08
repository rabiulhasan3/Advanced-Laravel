<?php

namespace App\Http\Controllers\validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormValidationRequest;

class FormValidationController extends Controller
{
    public function index(){
    	return view('validation.form');
    }

    public function store(FormValidationRequest $request){
    	
    	dd($request->all());
    }
}
