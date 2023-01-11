
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une offre de stage') }}
        </h2>

        <div class="pull-right">
            <x-link.offre_stage href="{{ route('hr.mesoffres_stage.index') }}" class="m-4">Retour</x-link.offre_stage>
        </div>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-jet-validation-errors class="mb-4" />

                    <form action="{{ route('hr.mesoffres_stage.update',$offre_stage->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-jet-label for="sujet_stage" value="{{ __('Sujet de stage :') }}" />
                            <x-jet-input id="sujet_stage" class="block mt-1 w-full" type="text" name="sujet_stage" value="{{ $offre_stage->sujet_stage}}"  required autofocus autocomplete="sujet_stage" />
                        </div>

                        <div>
                            <x-jet-label for="type_stage" value="{{ __('Type de stage :') }}" />
                            <x-jet-input id="type_stage" class="block mt-1 w-full" type="text" name="type_stage" value="{{ $offre_stage->type_stage }}" required autofocus autocomplete="type_stage" />
                        </div>

                        <div>
                            <x-jet-label for="duree_stage" value="{{ __('Durée de stage :') }}" />
                            <x-jet-input id="duree_stage" class="block mt-1 w-full" type="text" name="duree_stage" value="{{ $offre_stage->duree_stage }}" required autofocus autocomplete="duree_stage" />
                        </div>

                        <div>
                            <x-jet-label for="lieu_stage" value="{{ __('Lieu de stage :') }}" />
                            <x-jet-input id="lieu_stage" class="block mt-1 w-full" type="text" name="lieu_stage" value="{{ $offre_stage->lieu_stage }}" required autofocus autocomplete="lieu_stage" />
                        </div>


                        <div>
                            <x-jet-label for="profil_requis" value="{{ __('Profil requis :') }}" />

                            <textarea name="profil_requis" id="profil_requis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profil_requis" wire:model="profil_requis">{{ $offre_stage->profil_requis }}</textarea>
                        </div>

                        <div>
                            <x-jet-label for="description_stage" value="{{ __('Description de stage :') }}" />
                            <textarea name="description_stage" id="description_stage"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description_stage" wire:model="description_stage">{{ $offre_stage->description_stage }}</textarea>

                        </div>

                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Enregistrer Offre') }}
                            </x-jet-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>