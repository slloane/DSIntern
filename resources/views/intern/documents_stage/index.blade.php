<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes stagiaires') }}
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
                            <th class="px-4 py-2 w-22">Nom </th>

                            <th class="px-4 py-2 w-22">Email</th>
                            <th class="px-4 py-2 w-22">Formation</th>


                            <th class="px-4 py-2 w-22">CV</th>
                            <th class="px-4 py-2">Lettre de motivation</th>
                            <th class="px-4 py-2">Attestation</th>



                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($stagiaires as $stagiaire)


                        <tr>
                            <td class="border px-4 py-2">{{ $stagiaire->user->name }}</td>

                            <td class="border px-2 py-2">{{ $stagiaire->user->email}}</td>
                            <td class="border px-4 py-2">{{ $stagiaire->user->intern_formation}}</td>


                            <td class="border px-4 py-4"> <a href="{{ $stagiaire->demande_stages->url_cv }}"> Voir CV </a> </td>
                            <td class="border px-4 py-2" href="{{ $stagiaire->demande_stages->lettre_motivation }}">Voir lettre de motivation</td>
                            <td class="border px-4 py-2">


                                <a href="{{ $stagiaire->url_attestation }}"> Voir attestation </a>




                            </td>






                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>