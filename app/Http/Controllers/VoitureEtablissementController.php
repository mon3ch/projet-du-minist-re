<?php

namespace App\Http\Controllers;

use App\Models\action_charter;
use App\Models\Gouvernorat;
use App\Models\loi;
use App\Models\names_etablissements;
use App\Models\Programme;
use App\Models\voiture_etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitureEtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'type_voiture' => 'required|string',
        'categorie' => 'nullable|string',
        'date_premier_circulation' => 'nullable|date',
        'matriculation' => 'nullable|string',
        'action_charter_id' => 'required|exists:action_charters,id',
        'gouvernorat_id' => 'required|exists:gouvernorats,id',
        'name_etablissement_id' => 'required|exists:names_etablissements,id',
        ]);

        $etablissement = names_etablissements::find($request->name_etablissement_id);
        $gouvernorat = Gouvernorat::find($request->gouvernorat_id);

        $data['suivi_voiture'] = "📅 " . now()->format('Y-m-d H:i') .
                                " | الولاية: " . $gouvernorat->name .
                                " | 🏫 المؤسسة: " . $etablissement->name;
        $data['profile_id'] = Auth::id();
        voiture_etablissement::create($data);

          return redirect()
            ->route('action_charter.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(voiture_etablissement $voiture_etablissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(voiture_etablissement $voiture_etablissement)
    {
         if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $voiture_etablissement->gouvernorat_id) {
            abort(403);
        }
        $action_charter = $voiture_etablissement->action_charter;

        $loi = loi::latest()->first();
        $names_etablissements = auth()->user()->is_admin
            ? names_etablissements::all()
            : names_etablissements::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();

        return view('voiture_etablissement.edit', compact('loi','action_charter','voiture_etablissement', 'names_etablissements'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, voiture_etablissement $voiture_etablissement)
    {
         $data = $request->validate([
        'type_voiture' => 'required|string',
        'categorie' => 'nullable|string',
        'date_premier_circulation' => 'nullable|date',
        'matriculation' => 'nullable|string',
        'name_etablissement_id' => 'required|exists:names_etablissements,id',
        ]);

        $voiture = voiture_etablissement::findOrFail($voiture_etablissement->id);

        $changed = $voiture->name_etablissement_id != $request->name_etablissement_id ||
                $voiture->gouvernorat_id != $request->gouvernorat_id;

        if ($changed) {
            $oldSuivi = $voiture->suivi_voiture ?? '';

            $etablissement = names_etablissements::find($request->name_etablissement_id);

            $newLine = "\n📅 " . now()->format('Y-m-d H:i') .
                    " | الولاية: " . $etablissement->gouvernorat->name .
                    " | 🏫 المؤسسة: " . $etablissement->name;

               $data['suivi_voiture']= $oldSuivi . $newLine;
           
        }

        $voiture_etablissement->update($data);

          return redirect()
            ->route('action_charter.index')->with('success', 'تم تعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(voiture_etablissement $voiture_etablissement)
    {
        //
    }


     
    public function indexByCharter(action_charter $action_charter, Request $request)
    {
       
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }

        $voiture_etablissements = voiture_etablissement::where('action_charter_id', $action_charter->id)->paginate(10);
        return view('voiture_etablissement.index', compact('voiture_etablissements', 'action_charter'));
    }

    public function createByCharter(action_charter $action_charter)
    {
        
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }
      
        if (auth()->user()->is_admin) {
            $voiture_etablissements = voiture_etablissement::all();
        } else {
            $voiture_etablissements = voiture_etablissement::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();
        }

        if (auth()->user()->is_admin) {
            $names_etablissements = names_etablissements::all();
        } else {
            $names_etablissements = names_etablissements::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();
        }
        $loi = loi::latest()->first();
        return view( 'voiture_etablissement.create',compact('loi','voiture_etablissements', 'action_charter', 'names_etablissements') );

      
    }

}
