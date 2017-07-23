<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use input;
use App\User;
use Validator;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class logincontroller extends Controller
{
    
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    

  public function login(){
        // return 'Auth Login Panel';
        return view('project.login');
                   // ->with('title', 'Login');
    }

/**********************  Login System *********************/
    
   public function doLogin(Request $request)
    {
        $rules = array
        (
                    'email'    => 'required',
                    'password' => 'required'
        );

        $allInput = $request->all();
        $validation = Validator::make($allInput, $rules);

        // dd($allInput);


        if ($validation->fails())
        {

            return redirect()->route('login')
                        ->withInput()
                        ->withErrors($validation);
        } else
        {

            $credentials = array
            (
                        'email'    => $allInput['email'],
                        'password' => $allInput['password']
            );
            // return $credentials;
            if (Auth::attempt($credentials))
            {
                
                return redirect()->route('userhome');

            } else
            {
                return redirect()->route('login')
                            ->withInput()
                            ->withErrors('Error in Email Address or Password.');
            }
        }
        return 'Do Login Executes';
    }
    
    
    

    public function logout(){
        Auth::logout();
        return redirect()->route('login')
                    ->with('success',"You are successfully logged out.");
        
    }

 /************************** Register System ***************************/

  
   public function getRegister(){

         return view('project.register');
   }


   public function postRegister(Request $request){

  

   if($request->hasFile('image')){
    
     $image = $request->file('image');
     $imagename = "users_image/$request->email".'.'.$image->getClientOriginalExtension();
    
     //$image->move(base_path().'/public/users_image/', 
     //   $imagename );
     //    $fullImage = '/users_image/image-' . rand(229,18166) . strtotime(date('Y -m-d H:i:s')) . '.' . $image->getClientOriginalExtension();
     // $imagename = "users_image/ssssss".'.'.$image->getClientOriginalExtension();

     Image::make($image)->resize(1200, 600)->save(public_path($imagename));

   
  }
  else{

    return "ছবি আপলোড করুন";
  }



     $data = new user();

                    $data->name = $request->name;
                    $data->email = $request->email;
                    $data->password = Hash::make($request->password);
                    $data->joining_date = "--------";
                    $data->birth_of_date = $request->birth_of_date;
                    $data->contact_no = $request->contact_no;
                    $data->imagename = $imagename;
                    $data->school_name = $request->school_name;
                    $data->college_name = $request->college_name;
                    $data->university_name = $request->university_name;
                    $data->about = $request->about;
                    $data->fb_link = $request->fb_link;

       $data->save();
       
       session(['picture'  => $imagename ]);
       session(['email'  => $request->email]);
       session(['username' => $request->name]);
      // session(['id'  => $request->id]);
       
       return view('project.profile');
   }

}
