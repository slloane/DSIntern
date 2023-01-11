<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demandes de stage') }}
        </h2>


    </x-slot>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-22">Nom candidat</th>

                            <th class="px-4 py-2 w-22">Statut de la demande</th>

                            <th class="px-4 py-2 w-22">CV</th>
                            <th class="px-4 py-2">Lettre de motivation</th>
                            <th class="px-4 py-2">Actions</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_demandesstage as $demande_stage)


                        <tr>
                            <td class="border px-4 py-2">{{ $demande_stage->user->name }}</td>

                            <td class="border px-4 py-2">{{ $demande_stage->statut_demande }}</td>

                            <td class="border px-4 py-2"> <a href="{{ $demande_stage->url_cv }}"> Voir CV </a> </td>
                            <td class="border px-4 py-2" href="{{ $demande_stage->lettre_motivation }}">Voir lettre de motivation</td>
                            <td class="border px-4 py-2">

                                <form action="{{ route('hr.receiveddemandes_stage.confirmer',$demande_stage->id) }}" method="POST">
                                    @csrf
                                    <x-jet-button type="submit" class="m-4" href="{{ route('hr.receiveddemandes_stage.valider',$demande_stage->id)}}">Confirmer</x-jet-button>

                                </form>

                                <form action="{{ route('hr.mes_stagiaires.store',$demande_stage->id)}}" method="POST">
                                    @csrf

                                    <x-jet-button type="submit" class="m-4">Créer stagiaire</x-jet-danger-button>
                                </form>

                                <form action="{{ route('hr.receiveddemandes_stage.supprimer',$demande_stage->id) }}" method="POST">
                                    @csrf

                                    <x-jet-danger-button type="submit" class="m-4">Supprimer</x-jet-danger-button>
                                </form>
                            </td>




                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>