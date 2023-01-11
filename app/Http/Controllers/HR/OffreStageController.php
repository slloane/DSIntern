<?php

namespace App\Http\Controllers\HR;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;

use App\Http\Controllers\Controller;
use App\Models\OffreStage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class OffreStageController extends OriginalRegistrar
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        $offres_stage = Auth::user()->with('offre_stages')->find($user_id)->offre_stages;//To get the output in array

      //  $mes_offres=  Auth::user()::with('offre_stages')->find($user_id)->offre_stages; 
        //
       // $offres_stage = OffreStage::where('user_id', auth()->id());
       // $offres_stage = OffreStage::latest()->paginate(5);
    
        return view('HR.offres_stage.index',compact('offres_stage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    // all offers
    public function all_offres()
    {

      //  $mes_offres=  Auth::user()::with('offre_stages')->find($user_id)->offre_stages; 
        //
       // $offres_stage = OffreStage::where('user_id', auth()->id());
       $offres_stage = OffreStage::latest()->paginate(5);
    
        return view('offres_stage',compact('offres_stage'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('HR.offres_stage.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'type_stage'=> 'required',
            'duree_stage'=> 'required',
            'sujet_stage' => 'required',
            'profil_requis'=> 'required',
            'lieu_stage'=> 'required',
            'description_stage'=> 'required',
            //Rule::unique('users')->ignore($user->id),
            //'user_id'=>'required',       
        ]);
        
       //$validatedData = $request->safe()->merge(['user_id' => Auth::user()->id]);
        //offre_stage::create($request->all());
       // $offre_stage = OffreStage::create($validatedData);
       $offre_stage = New OffreStage();
       $offre_stage->user_id = Auth::user()->id;
       $offre_stage->type_stage = $request->type_stage;
       $offre_stage->duree_stage = $request->duree_stage;
       $offre_stage->sujet_stage = $request->sujet_stage;
       $offre_stage->profil_requis= $request->profil_requis;
       $offre_stage->lieu_stage = $request->lieu_stage;
       $offre_stage->description_stage = $request->description_stage;


       $offre_stage->save();
       //$offre_stage ['user_id'] = auth()->id();

        //$input = $request -> except(['_token']);  //remove csrf token insertion



        return redirect()->route('hr.mesoffres_stage.index')
                        ->with('success','offre_stage created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OffreStage  $offre_stage
     * @return \Illuminate\Http\Response
     */
    public function show(offre_stage $offre_stage)
    {
        return view('HR.offre_stages.show',compact('offre_stage'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OffreStage  $offre_stage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre_stage = OffreStage::findOrFail($id);
        if($offre_stage->user_id != auth()->id()){
            abort(403);
        }
        return view('HR.offres_stage.edit',compact('offre_stage'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OffreStage  $offre_stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type_stage'=> 'required',
            'duree_stage'=> 'required',
            'sujet_stage' => 'required',
            'profil_requis'=> 'required',
            'lieu_stage'=> 'required',
            'description_stage'=> 'required',
        ]);
        OffreStage::whereId($id)->update($validatedData);
    
        //$offre_stage->update($request->all());
    
        return redirect()->route('hr.mesoffres_stage.index')
                        ->with('success','offre_stage updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OffreStage  $offre_stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $offre_stage = OffreStage::findOrFail($id);
        if($offre_stage->user_id != auth()->id()){
            abort(403);
        }
        $offre_stage->delete();
        //$offre_stage->delete();
    
        return redirect()->route('hr.mesoffres_stage.index')
                        ->with('success','offre_stage deleted successfully');
    }

    public function getMesoffres($user_id) {
        $user_id = auth()->id();
        $mes_offres=  User::with('offre_stages')->find($user_id)->offre_stages; 
        //$quotes = Persona::with('quotes')->find($id)->quotes;
       //return View::make('HR.offre_stages.mesoffres')->with('offre_stages', $mes_offres);
        return view('HR.offres_stage.mesoffres',compact('mes_offres'));

    }
}
