<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Denomination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }


public function register(Request $request)
{
    $validator = $this->validator($request->all());
 
    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }
 
    $this->create($request->all());
 
     return redirect()->back()->with('message', 'User Added successfully');
}


public function allusers()
{

        $userlists=User::with('userlevel')->with('region')->with('denomination')->with('province')->get();

         // dd($userlists);

        return view('auth.allusers', compact('userlists'));
}

 public function destroy(User $user)
    {
        if($user->delete()) {
            return redirect()->back()->with('message', "Record deleted successfully");
        }

        return redirect()->back()->with('error', "An error occured while deleting record");
    }





    /**
     * 
 * Show the application registration form.
 *
 * @return \Illuminate\Http\Response
 */
public function showRegistrationForm()
{
    $denominations=Denomination::all();
    $provinces=DB::table('provinces')->get();
    $regions=DB::table('regions')->get();
    $userlevels=DB::table('userlevels')->get();
    return view('auth.register', compact('denominations', 'userlevels','provinces','regions'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'denomination_id' => $data['denomination_id'], 
            'province_id' => $data['province_id'],
            'region_id' => $data['region_id'], 
            'moblie' => $data['mobile'],
            'user_level' => $data['user_level'],
            'password' => Hash::make($data['password']),
        ]);

       
    }
}
 