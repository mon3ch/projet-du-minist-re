<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtablissementRHSousSupervisionRequest;
use App\Models\action_charter;
use App\Models\etablissement_rh;
use App\Models\loi;
use App\Models\names_etablissements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtablissementRhController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(EtablissementRHSousSupervisionRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']= Auth::id();
        etablissement_rh::create($formFields);
        return redirect()->route('etablissement_rh.indexByCharter',
        $formFields['action_charter_id'])->with('success', 'تمت إضافة المؤسسة بنجاح.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(etablissement_rh $etablissement_rh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(etablissement_rh $etablissement_rh)
    {
        $loi = loi::latest()->first();
        $action_charter = $etablissement_rh->action_charter;
        $gouvernorat_action_charter = $action_charter->gouvernorat_id;
        
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $gouvernorat_action_charter) {
            abort(403);
        }

        if (auth()->user()->is_admin) {
            $names_etablissements = names_etablissements::all();
        } else {
            $names_etablissements = names_etablissements::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();
        }
        return view( 'etablissement_rh.edit',compact('loi','etablissement_rh','names_etablissements', 'action_charter') );
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtablissementRHSousSupervisionRequest $request, etablissement_rh $etablissement_rh)
    {
        $formFields = $request->validated();
        $etablissement_rh->update($formFields);
        return redirect()->route('etablissement_rh.indexByCharter', $etablissement_rh->action_charter_id)->with('success', 'تمت تحديث بيانات المؤسسة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etablissement_rh $etablissement_rh)
    {
        //
    }


    
    public function indexByCharter(action_charter $action_charter, Request $request)
    {
       
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }

        $etablissement_rhs = etablissement_rh::where('action_charter_id', $action_charter->id)->paginate(10);
        return view('etablissement_rh.index', compact('etablissement_rhs', 'action_charter'));
    }

    public function createByCharter(action_charter $action_charter)
    {
        
        if (!auth()->user()->is_admin && auth()->user()->gouvernorat_id != $action_charter->gouvernorat_id) {
            abort(403);
        }

        if (auth()->user()->is_admin) {
            $names_etablissements = names_etablissements::all();
        } else {
            $names_etablissements = names_etablissements::where('gouvernorat_id', auth()->user()->gouvernorat_id)->get();
        }
        $loi = loi::latest()->first();
        return view( 'etablissement_rh.create',compact('loi','names_etablissements', 'action_charter') );

      
    }
}
