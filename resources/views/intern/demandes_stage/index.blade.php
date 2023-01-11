<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demandes de stage') }}
        </h2>

        <div class="pull-right">
            <x-link.offre_stage href="{{ route('intern.demandes_stage.create') }}" class="m-4">Ajouter une demande de stage</x-link.offre_stage>

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
                            <th class="px-4 py-2 w-22">Statut de la demande</th>

                            <th class="px-4 py-2 w-22">CV</th>
                            <th class="px-4 py-2">Lettre de motivation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($demandes_stage as $demande_stage)


                        <tr>
                            <td class="border px-4 py-2">{{ $demande_stage->statut_demande }}</td>

                            <td class="border px-4 py-2"> <a href="{{ $demande_stage->url_cv }}"> Voir CV </a> </td>
                            <td class="border px-4 py-2"><a href="{{ $demande_stage->lettre_motivation }}">Voir lettre de motivation</a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>