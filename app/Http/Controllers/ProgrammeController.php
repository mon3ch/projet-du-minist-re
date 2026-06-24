<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammeRequest;
use App\Models\Etablissement;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgrammeController extends Controller
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
        $programmes = programme::paginate(10); 
        return view('programme.index', compact('programmes'));
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
        return view('programme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgrammeRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        Programme::create($formFields);
        return redirect()->route('programme.index')->with('success', 'تم إنشاء البرنامج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        if (!Auth::user()->is_admin) {
            checkPermission($programme);
        }
        return view('programme.edit', compact('programme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgrammeRequest $request, Programme $programme)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $programme->update($formFields);
        return redirect()->route('programme.index')->with('success', 'تم تعديل البرنامج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();
        return to_route('programme.index')->with('success', 'تم حذف البرنامج بنجاح');
    }

    
    public function getEtablissements($programmeId)
    {
        $etablissements = Etablissement::where('programme_id', $programmeId)->get();
        return response()->json($etablissements);
    }

}
