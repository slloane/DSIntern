<?php

namespace App\Http\Controllers\Interns;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
 
use App\Http\Controllers\Controller;
use App\Models\DemandeStage;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;


class DemandeStageController extends OriginalRegistrar
{
    


/**
     * Show the form for editing the specified resource.
     *
    * @param  \App\Models\DemandeStage  $demande_stage
    * @return \Illuminate\Http\Response
    */
    
   public function postulerOffre($id)
   {
       
       return view('intern.demandes_stage.postuler',compact('id'));
   }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function candidate(Request $request, $id)
    {
        $files = [];
        $demande_stage = New DemandeStage();
        $demande_stage->offre_stages_id = $id;


        $storedDocument1 = $request->file('lettre_motivation')->store('public/documents_demande');
        $storedDocument2 = $request->file('url_cv')->store('public/documents_demande');

        // save file namewith full url in Documents table
       # $demande_stage->lettre_motivation= url('storage' . Str::substr($storedDocument1, 6));
       # $demande_stage->url_cv= url('storage' . Str::substr($storedDocument2, 6));
        $demande_stage->offre_stages_id = $request->route('id');
        $demande_stage->statut_demande = 'envoye';
        $demande_stage->user_id = Auth::user()->id;
       ~# $path_cv = $request->file('url_cv')->store('documents_demande'
        #);

        #$path_lm = $request->file('lettre_motivation')->store(
       # 'public/documents_demande');
        $demande_stage->lettre_motivation = url('storage' . Str::substr($storedDocument1, 6));
        $demande_stage->url_cv= url('storage' . Str::substr($storedDocument2, 6));
        $demande_stage->save();   


        array_push($files, Str::substr($storedDocument1, 14));
        array_push($files, Str::substr($storedDocument2, 14));


            // flash message in session
            session()->flash('message', 'fichiers téléchargés avec succès');
            session()->flash('files', implode(' ', $files));
   
            return redirect()->route('intern.demandes_stage.create');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->id();
        $demandes_stage = Auth::user()->with('demande_stages')->find($user_id)->demande_stages;
        return view('intern.demandes_stage.index',compact('demandes_stage'));
    }

    public function all_demandes()
    {
        $all_demandesstage = DemandeStage::latest()->paginate(5);
       # $comment = Comment::find(1);
 
        #return $comment->post->title;
        return view('hr.demandes_stage',compact('all_demandesstage'));


    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OffreStage  $offre_stage
     * @return \Illuminate\Http\Response
     */
    public function confirmer($id)
    {
        $demande_stage = DemandeStage::findOrFail($id);
        $demande_stage->statut_demande = "confirmé";
        $demande_stage->save(); 
        #return view('HR.offres_stage.edit',compact('offre_stage'));
        return redirect()->route('hr.receiveddemandes_stage')
                        ->with('succés','Vous avez confirmé cette demande de stage');
    }
    public function getStagiaires()
    {
        $all_demandesstage = DemandeStage::latest()->paginate(5);
       # $comment = Comment::find(1);
 
        #return $comment->post->title;
        return view('hr.stagiaires',compact('all_demandesstage'));

    }

    public function valider($id)
    {
        $demandestage = DemandeStage::findorFail($id);
        $demandestage->statut_demande = "stagiaire";
        $demandestage->save();
        return redirect()->route('hr.receiveddemandes_stage')
                        ->with('succés','Vous avez recruté un nouveau stagiaire'); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('intern.demandes_stage.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = [];
        $demande_stage = New DemandeStage();


        $storedDocument1 = $request->file('lettre_motivation')->store('public/documents_demande');
        $storedDocument2 = $request->file('url_cv')->store('public/documents_demande');

        // save file namewith full url in Documents table
       # $demande_stage->lettre_motivation= url('storage' . Str::substr($storedDocument1, 6));
       # $demande_stage->url_cv= url('storage' . Str::substr($storedDocument2, 6));
        $demande_stage->statut_demande = 'envoye';
        $demande_stage->user_id = Auth::user()->id;
       ~# $path_cv = $request->file('url_cv')->store('documents_demande'
        #);

        #$path_lm = $request->file('lettre_motivation')->store(
       # 'public/documents_demande');
        $demande_stage->lettre_motivation = url('storage' . Str::substr($storedDocument1, 6));
        $demande_stage->url_cv= url('storage' . Str::substr($storedDocument2, 6));
        $demande_stage->save();   


        array_push($files, Str::substr($storedDocument1, 14));
        array_push($files, Str::substr($storedDocument2, 14));


            // flash message in session
            session()->flash('message', 'fichiers téléchargés avec succès');
            session()->flash('files', implode(' ', $files));
   
            return redirect()->route('intern.demandes_stage.create');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demande_stage = DemandeStage::findOrFail($id);
        
        $demande_stage->delete();
        //$offre_stage->delete();
    
        return redirect()->route('hr.demandes_stage')
                        ->with('success','Cette demande est supprimée');
    }
}
