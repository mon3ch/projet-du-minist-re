<?php

namespace App\Http\Controllers;

use App\Http\Requests\NamesEtablissementRequest;
use App\Models\Etablissement;
use App\Models\Gouvernorat;
use App\Models\names_etablissements;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NamesEtablissementsController extends Controller
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
        $etablissements = names_etablissements::paginate(10); 
        $programmes = Programme::all();
       
        return view('names_etablissements.index', compact('programmes','etablissements'));
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
        $etablissements = Etablissement::all();
        $programmes = Programme::all();
        $gouvernorats = Gouvernorat::all();
        return view('names_etablissements.create', compact('programmes','etablissements', 'gouvernorats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NamesEtablissementRequest $request)
    {

        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $formFields['etablissement_id']=$request->etablissement_id;
        $formFields['gouvernorat_id']=$request->gouvernorat_id; 
        names_etablissements::create($formFields);
        return redirect()->route('names_etablissements.index')->with('success', 'تم إنشاء المؤسسة بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(names_etablissements $names_etablissements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(names_etablissements $names_etablissements)
{
    if (!Auth::user()->is_admin) {
        checkPermission($names_etablissements);
    }

    $etablissement = $names_etablissements;
    $etablissements = Etablissement::all();
    $programmes = Programme::all();
    $gouvernorats = Gouvernorat::all();

    return view('names_etablissements.edit', compact('programmes', 'etablissement', 'etablissements', 'gouvernorats'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(NamesEtablissementRequest $request, names_etablissements $names_etablissements)
    {
        $formFields = $request->validated();
        $formFields['profile_id']=Auth::id(); 
        $names_etablissements->update($formFields);
        return redirect()->route('names_etablissements.index')->with('success', 'تم تعديل المؤسسة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(names_etablissements $names_etablissements)
    {
        $names_etablissements->delete();
        return to_route('names_etablissements.index')->with('success', 'تم حذف المؤسسة بنجاح');
    }

    public function getNamesEtablissements($etablissement_id,$gouvernorat_id)
    {
          $names = names_etablissements::where('etablissement_id', $etablissement_id)
                                 ->where('gouvernorat_id', $gouvernorat_id)
                                 ->get();
        return response()->json($names);
    }

}
