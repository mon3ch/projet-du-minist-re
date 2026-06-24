<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementSousSupervisionRequest;
use App\Models\action_charter;
use App\Models\etablissement_sous_supervision;
use App\Models\loi;
use App\Models\names_etablissements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtablissementSousSupervisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(action_charter $action_charter, Request $request)
    {
        $etablissement_sous_supervisions = $action_charter->etablissements()->paginate(10);
        return view(
            'etablissement_sous_supervision.index',
            compact('etablissement_sous_supervisions', 'action_charter')
        );
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
    public function store(EtablissementSousSupervisionRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']= Auth::id();
        etablissement_sous_supervision::create($formFields);
        return redirect()->route('etablissement_sous_supervision.indexByCharter',
        $formFields['action_charter_id'])->with('success', 'تمت إضافة المؤسسة بنجاح.');

    }

    /**
     * Display the specified resource.
     */
    public function show(etablissement_sous_supervision $etablissement_sous_supervision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(etablissement_sous_supervision $etablissement_sous_supervision)
    {
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != optional($etablissement_sous_supervision->action_charter)->gouvernorat_id) {
            abort(403);
        }

        if (auth()->user()->is_admin) {
            $names_etablissements = names_etablissements::all();
        } else {
            $names_etablissements = names_etablissements::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();
        }

        $action_charter = $etablissement_sous_supervision->action_charter;
        $loi = loi::latest()->first();
        return view('etablissement_sous_supervision.edit', compact(
            'etablissement_sous_supervision',
            'action_charter',
            'names_etablissements',
            'loi',
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EtablissementSousSupervisionRequest $request, etablissement_sous_supervision $etablissement_sous_supervision)
    {   
        $formFields = $request->validated();
        if($formFields['is_public'] == 1){
            $formFields['event_reference'] = "";
        }
        $formFields['profile_id']= Auth::id();
        $etablissement_sous_supervision->update($formFields);
        
        return redirect()->route('etablissement_sous_supervision.indexByCharter',
        $formFields['action_charter_id'])->with('success', 'تم تحديث المؤسسة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etablissement_sous_supervision $etablissement_sous_supervision)
    {
        //
    }

    public function indexByCharter(action_charter $action_charter, Request $request)
    {

        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }

        $etablissement_sous_supervisions = etablissement_sous_supervision::where('action_charter_id', $action_charter->id)->paginate(10);
        return view('etablissement_sous_supervision.index', compact('etablissement_sous_supervisions', 'action_charter')
        );
    }

    public function createByCharter(action_charter $action_charter)
    {
        
        $loi = loi::latest()->first();
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }

        if (auth()->user()->is_admin) {
            $names_etablissements = names_etablissements::all();
        } else {
            $names_etablissements = names_etablissements::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();
        }
        return view( 'etablissement_sous_supervision.create',compact('loi','names_etablissements', 'action_charter') );

      
    }

}
