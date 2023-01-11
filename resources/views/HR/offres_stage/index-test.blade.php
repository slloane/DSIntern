<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offres de stage') }}
        </h2>

        <div class="pull-right">
            <x-link.offre_stage href="{{ route('hr.mesoffres_stage.create') }}" class="m-4">Ajouter une offre de stage</x-link.offre_stage>

        </div>
    </x-slot>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    @foreach ($offres_stage as $offre_stage)

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-5 intro-x">
                    <div class="box zoom-in">
                        <div class="p-5">
                            <div class="text-base font-medium truncate">Sujet du stage : {{ $offre_stage->sujet_stage }}</div>
                            <div class="text-gray-500 mt-1">Durée du stage : {{ $offre_stage->duree_stage }}</div>
                            <div class="text-gray-600 text-justify mt-1">Compétences requises : {{ $offre_stage->profil_requis }}</div>
                            <div class="text-gray-600 text-justify mt-1">Type de stage : {{ $offre_stage->type_stage}}</div>
                            <div class="text-gray-600 text-justify mt-1">Description de stage : {{ $offre_stage->description_stage}}</div>



                            <form action="{{ route('hr.mesoffres_stage.destroy',$offre_stage->id) }}" method="POST">


                                <x-link.offre_stage class="m-4" href="{{ route('hr.mesoffres_stage.edit',$offre_stage->id) }}">Modifier</x-link.offre_stage>


                                <form method="POST" action="{{ route('hr.mesoffres_stage.destroy', $offre_stage) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-jet-danger-button type="submit" onclick="return confirm('Vous etes sur ?')">Supprimer</x-jet-danger-button>
                                </form>
                        </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>


    </div>

    @endforeach
</x-app-layout>

create_original

@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter une offre de stage</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hr.mesoffres_stage.index') }}"> Retour</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('hr.mesoffres_stage.store') }}">

    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type de stage:</strong>
                <input type="text" name="type_stage" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Durée de stage:</strong>
                <input type="text" name="duree_stage" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Profil requis :</strong>
                <input type="text" name="profil_requis" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sujet de stage :</strong>
                <input type="text" name="sujet_stage" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>lieu de stage:</strong>
                <input type="text" name="lieu_stage" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description de stage:</strong>
                <textarea class="form-control" style="height:150px" name="description_stage"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
    <input type="hidden" id="user_id" name="user_id" value=auth()->id()>


</form>
@endsection
// old edit
@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hr.mesoffres_stage.index') }}"> Retour</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('hr.mesoffres_stage.update',$offre_stage->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sujet du stage :</strong>
                <input type="text" name="sujet_stage" value="{{ $offre_stage->sujet_stage}}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Durée du stage :</strong>
                <input type="text" name="duree_stage" value="{{ $offre_stage->duree_stage}}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Profil requis :</strong>
                <input type="text" name="profil_requis" value="{{ $offre_stage->profil_requis}}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lieu du stage :</strong>
                <input type="text" name="lieu_stage" value="{{ $offre_stage->lieu_stage}}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type du stage:</strong>
                <input type="text" name="type_stage" value="{{ $offre_stage->type_stage}}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description du stage:</strong>
                <textarea class="form-control" style="height:150px" name="description_stage">{{ $offre_stage->description_stage}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>

</form>
@endsection


// new edit