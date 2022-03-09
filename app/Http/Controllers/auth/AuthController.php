<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            // 'image' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'required|unique:users',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }

        return redirect("/")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'image'=> $data['image'],
        'password' => Hash::make($data['password'])

      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        // Session::flush();
        Auth::logout();

        return Redirect('/');
    }
    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();
    }
    public function edit(User $user)
    {
        $users = Auth::user();
        return view('profileEdit', compact('users'));
    }
    // public function edit(User $user){
    //     return view('profile');
    // }
    public function update(Request $request){
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'confirm_password' => ['same:new_password'],
        //  'new_password' => ['same:new_password'],

        ]);
        $user = Auth::user(); //single user
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $user->image = $filename;
        }
        if($request->confirm_password){
            $user->password = Hash::make($request->new_password);
        }
        // $users->image = $request->image;
        // $user->password = bcrypt(request('password'));
        $user->save();
        return redirect()->route('profile', compact('user'));

    }

}
