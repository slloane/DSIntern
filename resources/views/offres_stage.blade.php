<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offres de stage') }}
        </h2>


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
                            @if (auth()->user()->role_id == 2)
                            <x-link.offre_stage href="#" class="m-4">Postuler</x-link.offre_stage>
                            @endif




                        </div>




                    </div>
                </div>
            </div>
        </div>


    </div>

    @endforeach
</x-app-layout>