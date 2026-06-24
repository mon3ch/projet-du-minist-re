<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Gouvernorat;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user->is_admin){
            abort(403, 'Accès refusé');
        }
        $profiles = Profile::paginate(10);
        return view('profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    { 
        $user = Auth::user();
        if(!$user->is_admin){
            abort(403, 'Accès refusé');
        }

        $gouvernorats = Gouvernorat::all();
        return view('profile.create',compact('gouvernorats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('profile','public');
        }else{
            $formFields['image']='profile/default_image.png'; 
        }

        $formFields['is_active']=$request->is_active; //activate user by default
        $formFields['is_admin']=$request->is_admin ?? 0; //set role to user by default
        $formFields['profile_id']=Auth::id(); //set the creator id
        Profile::create($formFields);
        return redirect()->route('profile.index')->with('success', 'تم إنشاء المستخدم بنجاح');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
         return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {

        $user = Auth::user();
        if(!$user->is_admin){
            abort(403, 'Accès refusé');
        }
        $gouvernorats = Gouvernorat::all();
        return view('profile.edit', compact('profile','gouvernorats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
                
        //Validation
        $formFields = $request->validated();

        if($request->password === "initialpassword"){
            $formFields['password'] = $profile->password;
        }else{
            $formFields['password'] = Hash::make($request->password);
        }
 
        if($request->hasFile('image')){
            $formFields['image']=$request->file('image')->store('profile','public');
        }
        $formFields['is_active']=$request->is_active; //activate user by default
        $formFields['is_admin']=$request->is_admin ?? 0; //set role to user by default
        $formFields['profile_id']=Auth::id(); //set the creator id

        $profile->fill($formFields)->save();
        return to_route('profile.edit',$profile->id)->with('success', 'تم تحديث المستخدم بنجاح');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    { 
        $profile->delete();
        return to_route('profile.index')->with('success', 'تم حذف المستخدم بنجاح');
    }

    public function toggleStatus(Request $request)
    {
        $profile = Profile::find($request->id);
        if ($profile) {
            $profile->is_active = !$profile->is_active;
            $profile->save();
            return response()->json(['success' => true, 'status' => $profile->is_active]);
        }
        return response()->json(['success' => false], 404);
    }
}


