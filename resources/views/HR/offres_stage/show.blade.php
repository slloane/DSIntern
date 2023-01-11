@extends('mesoffres_stage.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Afficher Offre de stage</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mesoffres_stage.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type du stage:</strong>
                {{ $offre->type_stage}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Durée:</strong>
                {{ $offre->duree_stage }}
            </div>
        </div>
    </div>
@endsection