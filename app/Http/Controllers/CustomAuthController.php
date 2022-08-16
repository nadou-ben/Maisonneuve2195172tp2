<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use Illuminate\Validation\Rules\Password;
class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.passwords.login'); 
    }

    public function admin(){

        return view('Admin.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.passwords.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $users =  DB::table('users')
        ->WHERE('users.name','=',  $request->name)
        ->WHERE('users.email','=', $request->email)
        ->get();
        
        $request->validate([
            'name' => 'required|max:30|min:2',
            'username' => 'required|max:30|min:2',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(2)
             ->mixedCase()
             ->letters()
              ->numbers(),
              'max:20',
            ],
            'password_confirmation' => 'required',

        ]);
     
        $affected = DB::table('users')
        ->WHERE('users.name','=',  $request->name)
        ->WHERE('users.email','=', $request->email)
        ->WHERE('users.password','=',null)
        ->update([ 'username' => $request->username,'password' =>  Hash::make($request->password)]);
        if($affected) {
            back()->with("success","you have been successfuly registered");
            return redirect(route('login'));

        }else{
            return redirect()->back()->with("fail","Probleme de register ,remplir les champs de nouveau svp");
        }

    }

    
    public function customLogin(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)): 
            return redirect('login')->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $request->get('remember'));

        return redirect()->intended('auth/forum')->withSuccess('Connecté');

    }
    
    
    public function forum(){

        $name = "Invité";
        if(Auth::check()){
            $name = Auth::user()->name;
        }
        $articles = Article::all();
       
        return view('article.index', ['name' => $name,'articles' => $articles]);
    }
    /** 
     * logout
    */
    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect(route('welcome'));
    }
  /** 
     * showForgotForm
    */
    public function showForgotForm(){
        return view('auth.passwords.forgot');
    }
    /** 
     * sendResetLink
    */
    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);

        $token = \Str::random(64);
        DB::table('password_resets')->insert([
              'email'=>$request->email,
              'token'=>$token,
              'created_at'=>Carbon::now(),
        ]);
        
        $action_link = route('reset',['token'=>$token,'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b>Your app Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";

       \Mail::send('auth/passwords/email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
             $message->from('nadou2703.bk@gmail.com','Your App Name');
             $message->to($request->email,'Your name')
                     ->subject('Reset Password');
       });

       return back()->with('success', 'We have e-mailed your password reset link!');
   }
    /**
     * Display the specified resource.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

}
