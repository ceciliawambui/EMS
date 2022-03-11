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
            'email'=>['required','email'],
            'password'=>'required',
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'image' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->with('You have Successfully loggedin');
        }else{
            return redirect()->back()->with('status', 'Invalid credentials!');
        }


    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|unique:users',

        ]);

        $data = $request->all();
        if($request->hasFile("image")){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $data["image"] = $filename;
            // dd($filename);
        }

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
        'image'=>  $data['image'],
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
    // public function upload(Request $request)
    // {
    //     if($request->hasFile('image')){
    //         $filename = $request->image->getClientOriginalName();
    //         $request->image->storeAs('images',$filename,'public');
    //         Auth()->user()->update(['image'=>$filename]);
    //     }
    //     return redirect()->back();
    // }
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
            'name' => ['required', 'string', 'max:255'],
            // 'email' =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
        'confirm_password' => ['same:new_password'],
        //  'new_password' => ['same:new_password'],

        ]);
        $user = Auth::user(); //single user
        $user->name = $request->name;
        // $user->email = $request->email;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $user->image = $filename;
            // dd($filename);
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
