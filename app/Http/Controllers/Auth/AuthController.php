<?php

namespace App\Http\Controllers\Auth;
use DB;
use Auth;
use Hash;
use App\User;
use App\UserPending;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
   

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



 public function Register(){
        $dept = DB::table('department')->get();
        $user_type = DB::table('user_type')->get();
         return view('project.register')
                ->with('user_types',$user_type)
                ->with('depts',$dept);
   }


 public function postRegister(Request $request){
                    $data = new UserPending();

                    $data->name = $request->name;
                    $data->email = $request->email;
                    $data->password = Hash::make($request->password);
                    
                    $data->contact = $request->contact_no;
                   
                    $data->dept_id = $request->department;
                    $data->user_type = $request->user_type;
       $data->save();
       return  Redirect::to('/')->with('message', 'Your request for new account has been sent to Admin');
}
public function login(){
    
        return view('project.login');
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
                
                //return redirect()->route('userhome')->with('email' , $allInput['email']);

        
               
                

               // return view('project.userhome');
                    if(Auth::user()->user_type==2)
                return redirect()->route('event.mysubs');
            else
                return redirect()->route('event.index');

            } else
            {
                return redirect()->route('login')
                            ->withInput()
                            ->withErrors('Error in Email Address or Password.');
            }
        }
        return 'Do Login Executes';
    }
    
    
    

    public function logout(Request $request ){

        Auth::logout();

        $request->session()->flush();

        return redirect()->route('event.index')
                   ->with('success',"You are successfully logged out.");
        // return 'Logout Panel';
    }


 /************************** Register System ***************************/

}
