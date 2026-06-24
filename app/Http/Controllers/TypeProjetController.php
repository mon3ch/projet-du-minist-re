<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeProjetRequest;
use App\Models\nature_projet;
use App\Models\type_projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeProjetController extends Controller
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
        $type_projets = type_projet::with('nature_projet')->paginate(10);//nature_projet declared in the Model file 'Type_projet for get the nature project of the type project'
        return view('type_projet.index', compact('type_projets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if(!$user->is_admin){
            abort(403, 'Accès refusé');
        }
        $nature_projets = nature_projet::all();
        return view('type_projet.create', compact('nature_projets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeProjetRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); //set the creator id
        $formFields['nature_projet_id']= (int) $request->nature_projet_id;
        type_projet::create($formFields);
        return redirect()->route('type_projet.index')->with('success', 'تم إنشاء نوع المشروع بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(type_projet $type_projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type_projet $type_projet)
    {
        if (!Auth::user()->is_admin) {
            checkPermission($type_projet);
        }
        $nature_projets = nature_projet::all();
        return view('type_projet.edit', compact('type_projet','nature_projets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeProjetRequest $request, type_projet $type_projet)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $type_projet->update($formFields);
        return redirect()->route('type_projet.index')->with('success', 'تم تعديل نوع المشروع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type_projet $type_projet)
    {
        $type_projet->delete();
        return to_route('type_projet.index')->with('success', 'تم حذف نوع المشروع بنجاح');
    }

    public function getTypes($nature_id)
    {
        $types = type_projet::where('nature_projet_id', $nature_id)->get();
        return response()->json($types);
    }
}
