<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use \App\Http\Controllers\Interns\DemandeStageController;
use App\Models\DemandeStage;
use Illuminate\Support\Facades\Auth;

use App\Models\Stagiaire;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $stagiaires = Stagiaire::latest()->paginate(5);
        # $comment = Comment::find(1);
  
         #return $comment->post->title;
         return view('hr.stagiaires.index',compact('stagiaires'));
 
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mes_docs()
    {
        $user_id = auth()->id();

        //$stagiaires= Stagiaire::where('user_id'
        //, $user_id)->Paginate(10);
        $stagiaires = Auth::user()->with('stagiaires')->find($user_id)->stagiaires;//To get the output in array

      //  $mes_offres=  Auth::user()::with('offre_stages')->find($user_id)->offre_stages; 
        //
       // $offres_stage = OffreStage::where('user_id', auth()->id());
       // $offres_stage = OffreStage::latest()->paginate(5);
    
        return view('intern.documents_stage.index',compact('stagiaires'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function upload($id){
        $stagiaire = Stagiaire::findOrFail($id);
        return view("hr.stagiaires.upload",compact('id'));

    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload_attestation(Request $request, $id)
    {
        $files = [];
        $stagiaire =  Stagiaire::findorFail($id);


        $storedDocument = $request->file('url_attestation')->store('public/documents_stagiaire');

        // save file namewith full url in Documents table
       # $demande_stage->lettre_motivation= url('storage' . Str::substr($storedDocument, 6));
       # $demande_stage->url_cv= url('storage' . Str::substr($storedDocument2, 6));
        
       
       $stagiaire->url_attestation = url('storage' . Str::substr($storedDocument, 6));
       $stagiaire->save();   


        array_push($files, Str::substr($storedDocument, 14));


            // flash message in session
            session()->flash('message', 'attestation téléchargée avec succès');
            session()->flash('files', implode(' ', $files));
   
            return redirect()->route('hr.mes_stagiaires.stagiaire.attestation',$id);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
       $demandestage = DemandeStage::findorFail($id);

       $stagiaire = New Stagiaire();
       $stagiaire->demande_stages_id = $id;
       $stagiaire->user_id = $demandestage->user_id;
       $stagiaire->save();
       //$stagiaire ['user_id'] = auth()->id();

        //$input = $request -> except(['_token']);  //remove csrf token insertion



        return redirect()->route('hr.mes_stagiaires')
                        ->with('success','stagiaire ajouté avec succès.');
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
        $stagiaire = Stagiaire::findOrFail($id);
        
        $stagiaire->delete();
        //$offre_stage->delete();
    
        return redirect()->route('hr.mes_stagiaires')
                        ->with('success','Ce stagiaire est supprimé');
    }
}
