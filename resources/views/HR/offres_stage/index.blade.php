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