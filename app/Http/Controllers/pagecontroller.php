<?php

namespace App\Http\Controllers;


use Carbon\Carbon;


use Input;
use App\User;
use App\Blog;
use App\message;
use Validator;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Response;
use App\Http\Controllers\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;




class pagecontroller extends Controller
{
   
    public function home()
    {
        return view('project.home');
       // return Redirect::to('home');
    }

    public function login()
    {
        return view('project.login');
    }

    public function register()
    {
        return view('project.register');
    }


    public function err()
    {
        return view('project.error');
    }


}
    //   return response()->json(array('sms' => 'saved successfully'));
        // return Response::json(Request::all());
   // }

      // return response()->json(('project.userhome'));
       
