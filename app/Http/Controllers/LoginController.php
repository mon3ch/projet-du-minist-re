<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Gouvernorat;
use App\Models\Profile;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    

    public function index()
    {
        $user = Auth::user();

        $projetsQuery = Projet::query();
        if (!$user->is_admin) {
            $projetsQuery->where('projets.profile_id', $user->id)
            ->orWhere('projets.gouvernorat_id', $user->gouvernorat_id);
        }

        $totalProjets = (clone $projetsQuery)->count();

        $projetsParGouvernorat = (clone $projetsQuery)
            ->join('gouvernorats', 'projets.gouvernorat_id', '=', 'gouvernorats.id')
            ->select('gouvernorats.name as name')
            ->selectRaw('COUNT(projets.id) as total')
            ->groupBy('gouvernorats.name')
            ->get();

        $projetsParDelegation = (clone $projetsQuery)
            ->join('delegations', 'projets.delegation_id', '=', 'delegations.id')
            ->select('delegations.name as name')
            ->selectRaw('COUNT(projets.id) as total')
            ->groupBy('delegations.name')
            ->get();

        $projetsParFinancement = (clone $projetsQuery)
            ->join('financements', 'projets.financement_id', '=', 'financements.id')
            ->select('financements.name as name')
            ->selectRaw('COUNT(projets.id) as total')
            ->groupBy('financements.name')
            ->get();

        $totalProfiles = Profile::count();
        $totalProfilesactive = Profile::where('is_active', 1)->count();
        $totalProfilesinactive = Profile::where('is_active', 0)->count();

        $projets = (clone $projetsQuery)
            ->select('nom_projet', 'description', 'latitude', 'longitude')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();
            
        return view('statistiques', compact(
            'totalProjets',
            'projetsParGouvernorat',
            'projetsParDelegation',
            'projetsParFinancement',
            'totalProfiles',
            'totalProfilesactive',
            'totalProfilesinactive',
            'projets'
        ));
    }


    public function show()
    {
        if(Auth::user()){
            return to_route('dashbord');
        }
        return view('login.show');   
    }

    public function login(Request $request)
    { 

        $login=$request->email;
        $password=$request->password;
        $credentials = ['email' => $login, 'password' => $password];

        $user=Profile::where('email',$login)->first();
        if($user && !$user->is_active){
            return to_route('login.show')->with('success', "لم يتم تفعيل حسابك، يرجى التواصل مع المسؤول");
        }

         if(!Auth::attempt($credentials)) {
            return to_route('login.show')->with('success', 'تحقق من بريدك الإلكتروني / كلمة المرور');
        }

        if (Auth::attempt($credentials) && Auth::user()->is_active) {
                // Authentication passed 
                $request->session()->regenerate();
                return to_route('dashbord');
        }
            
        return to_route('login.show')->with('success', "خطأ في الاتصال");
        
       
     
    }

    
    
    public function signup(ProfileRequest $request)
    {
        $formFields = $request->validated();
        if(strtoupper($request->captcha_input) !== strtoupper($request->captcha_code)) {
            return back()->withInput()->withErrors(['captcha_input' => 'الرمز غير صحيح']);
        }
        
        $formFields['password'] = Hash::make($request->password);
        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('profile','public');
        }else{
            $formFields['image']='profile/default_image.png'; 
        }

        $formFields['profile_id']=Auth::id()?Auth::id() : 0; 
        Profile::create($formFields);
        return to_route('login.show')->with('success', "تم التسجيل بنجاح! يُرجى التواصل مع المسؤول لتفعيل حسابك.");
    }

    public function signupShow()
    {
         $gouvernorats = Gouvernorat::all();
        return view('signup.show',compact('gouvernorats'));
    }

    public function logout()
    {
        Session::flush(); // Clear all session data

        Auth::logout();// Log out the user

        return to_route('login.show')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
