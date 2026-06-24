<?php

namespace App\Http\Controllers;

use App\Models\Gouvernorat;
use Illuminate\Http\Request;
use App\Http\Requests\GouvernoratRequest;
use Illuminate\Support\Facades\Auth;

class GouvernoratController extends Controller
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
        $gouvernorats = Gouvernorat::paginate(10); // Adjust the number of items per page as needed
        return view('gouvernorat.index', compact('gouvernorats'));
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
        return view('gouvernorat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GouvernoratRequest $request, Gouvernorat $gouvernorat)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id();
        Gouvernorat::create($formFields);

        return redirect()->route('gouvernorat.index')->with('success', 'تم إنشاء الولاية بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Gouvernorat $gouvernorat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gouvernorat $gouvernorat)
    {
        if (!Auth::user()->is_admin) {
            checkPermission($gouvernorat);
        }
        return view('gouvernorat.edit', compact('gouvernorat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GouvernoratRequest $request, Gouvernorat $gouvernorat)
    {
        $formFields = $request->validated();
        $gouvernorat->update($formFields);
        return redirect()->route('gouvernorat.index')->with('success', 'تم تعديل الولاية بنجاح');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gouvernorat $gouvernorat)
    {
        $gouvernorat->delete();
        return to_route('gouvernorat.index')->with('success', 'تم إلغاء الولاية بنجاح');
    }
}
