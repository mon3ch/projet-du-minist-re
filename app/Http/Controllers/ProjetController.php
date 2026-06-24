<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetRequest;
use App\Models\Delegation;
use App\Models\Etablissement;
use App\Models\Financement;
use App\Models\Gouvernorat;
use App\Models\names_etablissements;
use App\Models\nature_projet;
use App\Models\Profile;
use App\Models\Programme;
use App\Models\Projet;
use App\Models\type_projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $query = Projet::with(['gouvernorat','delegation','financement','etablissement','profile']);

    if (!Auth::user()->is_admin) {
        $query->where('profile_id', Auth::id())
        ->orWhere('projets.gouvernorat_id', Auth::user()->gouvernorat_id);
    }

    
    if ($request->filled('search')) {
        $search = $request->input('search');

        $query->where(function ($q) use ($search) {
            $q->where('nom_projet', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%")
              ->orWhereHas('gouvernorat', function ($q2) use ($search) {
                  $q2->where('name', 'like', "%$search%");
              })
              ->orWhereHas('delegation', function ($q2) use ($search) {
                  $q2->where('name', 'like', "%$search%");
              })
              ->orWhereHas('etablissement', function ($q2) use ($search) {
                  $q2->where('name', 'like', "%$search%");
              });
        });
    }

    $projets = $query->paginate(50)->appends(['search' => $request->search]);

    return view('projet.index', compact('projets'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (!Auth::user()->is_admin) {
            $gouvernorats = Gouvernorat::where('id', Auth::user()->gouvernorat_id)->get();
        } else {
            $gouvernorats = Gouvernorat::all();
        }
        $delegations = collect() ;
        $etablissements = collect();
        $names_etablissements = collect();
        $financements = Financement::all();
        $programmes = Programme::all();
        $profiles = Profile::all();
        $nature_projets = nature_projet::all();
        $type_projets = type_projet::all();
        return view('projet.create',compact('names_etablissements','nature_projets','type_projets','gouvernorats','delegations','financements','programmes','etablissements','profiles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjetRequest $request)
    {
        
        $formFields = $request->validated();
        $formFields['profile_id'] = Auth::id();
        $formFields['etablissement_id'] =  $request->etablissement_id;
        $formFields['nature_projet_id'] = $request->nature_projet_id;
        $formFields['type_projet_id'] = $request->type_projet_id;
        $formFields['name_etablissement_id'] = $request->name_etablissement_id;
        $formFields['programme_id'] = $request->programme_id;
        $formFields['delegation_id'] =  $request->delegation_id;
        $formFields['gouvernorat_id'] = $request->gouvernorat_id;
        Projet::create($formFields);
        return redirect()->route('projet.index')->with('success', 'تم إنشاء المشروع بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projet $projet)
    {
        //
    }

    public function edit(Projet $projet)
    {
        if (!Auth::user()->is_admin && $projet->gouvernorat_id !== Auth::user()->gouvernorat_id) {
            checkPermission($projet);
        }

        $gouvernorats = Auth::user()->is_admin 
                        ? Gouvernorat::all() 
                        : Gouvernorat::where('id', Auth::user()->gouvernorat_id)->get();

        $delegations = Delegation::where('gouvernorat_id', $projet->gouvernorat_id)->get();
        $programmes = Programme::all();
        $etablissements = Etablissement::where('programme_id', $projet->programme_id)->get();
        $names_etablissements = names_etablissements::where('gouvernorat_id', $projet->gouvernorat_id)
                                                    ->where('etablissement_id', $projet->etablissement_id)
                                                    ->get();
        $nature_projets = nature_projet::all();
        $type_projets = type_projet::where('nature_projet_id', $projet->nature_projet_id)->get();
        $financements = Financement::all();
        $profiles = Profile::all();

        return view('projet.edit', compact(
            'projet', 
            'gouvernorats', 
            'delegations', 
            'programmes', 
            'etablissements', 
            'names_etablissements', 
            'nature_projets',
            'type_projets',
            'financements',
            'profiles'
        ));
    }
    public function getDelegations($gouvernorat_id)
    {
        $delegations = Delegation::where('gouvernorat_id', $gouvernorat_id)->get();
        return response()->json($delegations);
    }

    public function getEtablissements($programme_id)
    {
        $etablissements = Etablissement::where('programme_id', $programme_id)->get();
        return response()->json($etablissements);
    }

    public function getNamesEtablissements($gouvernorat_id, $etablissement_id)
    {
        $names = names_etablissements::where('gouvernorat_id', $gouvernorat_id)
                                    ->where('etablissement_id', $etablissement_id)
                                    ->get();
        return response()->json($names);
    }


   /**
     * Update the specified resource in storage.
     */
    public function update(ProjetRequest $request, Projet $projet)
    {
        $formFields = $request->validated();
        $formFields['etablissement_id'] = $request->etablissement_id;
        $projet->update($formFields);
        return redirect()->route('projet.index')->with('success', 'تم تعديل المشروع بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();
        return to_route('projet.index')->with('success', 'تم حذف المشروع بنجاح');
    }


        
    public function export()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            $projets = Projet::with(['gouvernorat', 'delegation', 'financement', 'etablissement'])->get();
        } else {
            $projets = Projet::with(['gouvernorat', 'delegation', 'financement', 'etablissement'])
                            ->where('gouvernorat_id', $user->gouvernorat_id)
                            ->get();
        }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="projects.xls"');
    header('Cache-Control: max-age=0');

    echo "<table border='1' cellpadding='5' cellspacing='0' ";

    // Header title
    echo "<tr style='background-color:#f2f2f2; text-align:center; font-weight:bold; font-size:16px;'>";
    echo "<th colspan='28'>جدول متابعة مشاريع البنية الأساسية لمهمة الأسرة والمرأة والطفولة وكبار السن</th>";
    echo "</tr>";

    // Column headers
    $headers = [
        'تاريخ القبول النهائي', 
        'تاريخ القبول الوقتي',
        'تاريخ انتهاء الأشغال', 
        'مدة الأشغال', 
        'تاريخ بداية الأشغال',
        'ملاحظات عامة حول المشروع',
        'مرحلة المشروع', 
        'نسبة تقدم الأشغال',
        'الاعتمادات المرصودة (أ.د) (دفعا)',
        'مبلغ الصفقة', 
        ' الاعتمادات المرصودة (أ.د) (تعهدا)/أو الكلفة التقديرية للمشروع',
        'التمويل',
        'الوضعية العقارية',
        'سنة البرمجة', 
         'القسط', 
        'وضعية المؤسسة الوظيفية',
        'اسم المؤسسة',
        'نوع المشروع', 
        'صبغة المشروع',
        'تفاصيل المشروع', 
        'نوع المؤسسة', 
        'بيان المشروع', 
         'البرنامج',
        'المعتمدية',
        'المندوبية الجهوية',

    ];

    echo "<tr style='background-color:#d9edf7; font-weight:bold; text-align:center;'>";
    foreach ($headers as $header) {
        echo "<th>{$header}</th>";
    }
    echo "</tr>";

    // Data rows
    $rowColor = false;
    foreach ($projets as $projet) {
        $bg = $rowColor ? '#f9f9f9' : '#ffffff';
        $rowColor = !$rowColor;
        echo "<tr style='background-color:{$bg};'>";
        echo "<td>{$projet->date_acceptation_finale}</td>";
        echo "<td>{$projet->date_acceptation_temporaire}</td>";
        echo "<td>{$projet->date_fin_travaux}</td>";
        echo "<td>{$projet->duree}</td>";
        echo "<td>{$projet->date_debut}</td>";
        echo "<td>{$projet->Remarque}</td>";
        echo "<td>{$projet->phase_projet}</td>";
        echo "<td>{$projet->pourcentage_avancement}</td>";
        echo "<td>{$projet->credit_recommande_Payeur}</td>";
        echo "<td>{$projet->cout_marche}</td>";
        echo "<td>{$projet->credit_recommande_engager}</td>";
        echo "<td>" . optional($projet->financement)->name . "</td>";
        echo "<td>{$projet->situation_immobiliere}</td>";
        echo "<td>{$projet->date}</td>";
        echo "<td>{$projet->tranche}</td>";
        echo "<td>{$projet->situation_etablissement_fonctionnelle}</td>";
        echo "<td>" . optional($projet->name_etablissement)->name . "</td>"; 
        echo "<td>" . optional($projet->type_projet)->name . "</td>"; 
        echo "<td>" . optional($projet->nature_projet)->name . "</td>"; 

        echo "<td>{$projet->details_projet}</td>";


        echo "<td>".optional($projet->etablissement)->name."</td>";
        
        
        echo "<td>{$projet->description}</td>";
        echo "<td>" . optional($projet->programme)->name . "</td>";
        echo "<td>" . optional($projet->delegation)->name . "</td>";
        echo "<td>" . optional($projet->gouvernorat)->name . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    exit;
}

public function importJson(Request $request)
{
    $data = $request->input('data', []);

    try {
        foreach ($data as $row) {
            Projet::create([
                'profile_id' => Auth::id()  ?? 2 ,
                'date_acceptation_finale' => $row['تاريخ القبول النهائي'] ?? null,
                'date_acceptation_temporaire' => $row['تاريخ القبول الوقتي'] ?? null,
                'date_fin_travaux' => $row['تاريخ انتهاء الأشغال'] ?? null,
                'duree' => $row['مدة الأشغال'] ?? null,
                'date_debut' => $row['تاريخ بداية الأشغال'] ?? null,
                'Remarque' => $row['ملاحظات عامة حول المشروع'] ?? null,
                'phase_projet' => $row['مرحلة المشروع'] ?? null,
                'pourcentage_avancement' => $row['نسبة تقدم الأشغال'] ?? null,
                'credit_recommande_Payeur' => $row['الاعتمادات المرصودة (أ.د) (دفعا)'] ?? null,
                'cout_marche' => $row['مبلغ الصفقة'] ?? null,
                'credit_recommande_engager' => $row['الاعتمادات المرصودة (أ.د) (تعهدا)/أو الكلفة التقديرية للمشروع'] ?? null,
                'financement_id' => $row['التمويل'] ?? null,
                'situation_immobiliere' => $row['الوضعية العقارية'] ?? null,
                'date' => $row['سنة البرمجة'] ?? null,
                'tranche' => $row['القسط'] ?? null,
                'situation_etablissement_fonctionnelle' => $row['وضعية المؤسسة الوظيفية'] ?? null,
                'etablissement_id' => $row['نوع  المؤسسة'] ?? null,
                'name_etablissement_id' => $row['اسم المؤسسة'] ?? null,
                'type_projet_id' => $row['نوع المشروع'] ?? null,
                'nature_projet_id' => $row['صبغة المشروع'] ?? null,
                'details_projet' => $row['تفاصيل المشروع'] ?? null,
                'description' => $row['بيان المشروع'] ?? null,
                'programme_id' => $row['البرنامج'] ?? null,
                'delegation_id' => $row['المعتمدية'] ?? null,
                'gouvernorat_id' => $row['المندوبية الجهوية'] ?? null,
            ]);
        }

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}


   
}
