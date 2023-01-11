@extends('layouts.main')


@section('content')
<div class="col-lg-8 post-list">
    @foreach($offres_stage as $offre_stage)
        <div class="single-post d-flex flex-row">
            
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <h6>{{ $offre_stage->type_stage  }}</h6>					
                    </div>
                </div>
                <p>
                    {{  $offre_stage->duree_stage }}
                </p>
                <h5>Profil requis: {{ $offre_stage->profil_requis }}</h5>
                <p class="address"><span class="lnr lnr-map"></span> {{ $offre_stage->description_stage }}</p>
                <p class="address"><span class="lnr lnr-database"></span> {{ $offre_stage->lieu_stage }}</p>
            </div>
        </div>
        <h1> HI kaoutar</h1>

    @endforeach
</div>	

      
@endsection