<?php

namespace App\Http\Controllers;

use App\Http\Requests\NatureProjetRequest;
use App\Models\nature_projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NatureProjetController extends Controller
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
        $nature_projets = nature_projet::paginate(10); 
        return view('nature_projet.index', compact('nature_projets'));
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
        return view('nature_projet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NatureProjetRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); //set the creator id
        nature_projet::create($formFields);

        return redirect()->route('nature_projet.index')->with('success', 'تم إنشاء صبغة المشروع بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(nature_projet $nature_projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nature_projet $nature_projet)
    {
        /*
        * Check Permission
        */
        if (!Auth::user()->is_admin) {
            checkPermission($nature_projet);
        }
        return view('nature_projet.edit', compact('nature_projet'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NatureProjetRequest $request, nature_projet $nature_projet)
    {
        $formFields = $request->validated();
        $nature_projet->update($formFields);
        return redirect()->route('nature_projet.index')->with('success', 'تم تعديل صبغة المشروع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nature_projet $nature_projet)
    {
        $nature_projet->delete();
        return to_route('nature_projet.index')->with('success', 'تم إلغاء صبغة المشروع بنجاح');
    }
}
