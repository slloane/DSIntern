<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes stagiaires') }}
        </h2>
        <div class="pull-right">
            <x-link.offre_stage href="{{ route('hr.mes_stagiaires.generer_attestation') }}" class="m-4">Générer une attestation de stage</x-link.offre_stage>

        </div>


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
                        @if ($demande_stage->statut_demande == "stagiaire")

                        <tr>
                            <td class="border px-4 py-2">{{ $demande_stage->user->name }}</td>

                            <td class="border px-4 py-2">{{ $demande_stage->statut_demande }}</td>

                            <td class="border px-4 py-2"> <a href="{{ $demande_stage->url_cv }}"> Voir CV </a> </td>
                            <td class="border px-4 py-2" href="{{ $demande_stage->lettre_motivation }}">Voir lettre de motivation</td>
                            <td class="border px-4 py-2">

                                <form action="{{ route('hr.receiveddemandes_stage.valider',$demande_stage->id) }}" method="POST">
                                    @csrf
                                    <x-jet-button type="submit" href="{{ route('hr.receiveddemandes_stage.valider',$demande_stage->id)}}">Déposer attestation</x-jet-button>
                                    <div>
                                        <input type="file" name="url_attestation" id="url_attestation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>

                                </form>


                                <form action="{{ route('hr.mes_stagiaires.supprimer',$demande_stage->id) }}" method="POST" class="inline-block">
                                    @csrf

                                    <x-jet-danger-button type="submit" class="m-4">Supprimer</x-jet-danger-button>
                                </form>
                            </td>




                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>