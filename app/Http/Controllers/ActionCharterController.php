<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionCharter;
use App\Http\Requests\ActionCharterRequest;
use App\Models\action_charter;
use App\Models\Gouvernorat;
use App\Models\loi;
use App\Models\Programme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionCharterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loi = loi::latest()->first();
        if (!Auth::user()->is_admin) {
            $action_charters = action_charter::where('gouvernorat_id', Auth::user()->gouvernorat_id)->paginate(10);
        } else {
            $action_charters = action_charter::paginate(10);
        }
        return view('action_charter.index', compact('action_charters', 'loi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loi = loi::latest()->first();
        $programmes = Programme::all();
        $gouvernorats = Gouvernorat::all();
        return view('action_charter.create', compact('programmes', 'gouvernorats','loi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActionCharterRequest $request)
    {
        $existing = action_charter::where([
            'programme_id' => $request->programme_id,
            'gouvernorat_id' => $request->gouvernorat_id,
        ])->first();

        if ($existing && Carbon::parse($existing->created_at)->isCurrentYear()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'programme_id' => 'يوجد بالفعل ميثاق تصرف لهذا البرنامج في هذه الجهة لهذه السنة.',
                ]);
        }

        $formFields = $request->validated();
        $formFields['profile_id'] = Auth::id();

        action_charter::create($formFields);

        return redirect()
            ->route('action_charter.index')
            ->with('success', 'تم إنشاء ميثاق التصرف الجهوي بنجاح.');
    }


    /**
     * Display the specified resource.
     */
    public function show(action_charter $action_charter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(action_charter $action_charter)
    {
        $loi = loi::latest()->first();
         return view('action_charter.edit', [
            'actionCharter' => $action_charter,
            'programmes' => Programme::all(),
            'gouvernorats' => Gouvernorat::all(),
            'loi'=>$loi,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActionCharterRequest $request, action_charter $action_charter)
    {
        $validatedData = $request->validated();

        $action_charter->update($validatedData);

        return redirect()
            ->route('action_charter.index')
            ->with('success', 'تم تحديث ميثاق التصرف الجهوي بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(action_charter $action_charter)
    {
        
        $action_charter->delete();
        return redirect()
            ->route('action_charter.index')
            ->with('success', 'تمت إزالة ميثاق التصرف بنجاح.');
    }
}
