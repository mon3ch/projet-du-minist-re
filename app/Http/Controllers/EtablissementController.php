<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementRequest;
use App\Models\Etablissement;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtablissementController extends Controller
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
        $etablissements = Etablissement::paginate(10); // Adjust the number of items per page as needed
        return view('etablissement.index', compact('etablissements'));
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
        $programmes = Programme::all();
        return view('etablissement.create', compact('programmes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtablissementRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $formFields['programme_id']=$request->programme_id; 
        Etablissement::create($formFields);
        return redirect()->route('etablissement.index')->with('success', 'تم إنشاء المؤسسة بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Etablissement $etablissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etablissement $etablissement)
    {
        if (!Auth::user()->is_admin) {
            checkPermission($etablissement);
        }
        $programmes = Programme::all(); 

        return view('etablissement.edit', compact('etablissement', 'programmes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtablissementRequest $request, Etablissement $etablissement)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $etablissement->update($formFields);
        return redirect()->route('etablissement.index')->with('success', 'تم تعديل المؤسسة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
        return to_route('etablissement.index')->with('success', 'تم حذف المؤسسة بنجاح');
    }

    public function getProgramme($id)
    {
        $etablissement = Etablissement::with('programme')->find($id);

        if (!$etablissement || !$etablissement->programme) {
            return response()->json(['success' => false, 'message' => 'Aucun programme trouvé']);
        }

        return response()->json([
            'success' => true,
            'programme' => [
                'id' => $etablissement->programme->id,
                'name' => $etablissement->programme->name,
            ]
        ]);
    }

    
}
