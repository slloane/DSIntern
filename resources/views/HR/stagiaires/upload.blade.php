<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uploader une attestation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('hr.mes_stagiaires.stagiaire.attestation.upload', $id ) }}" enctype="multipart/form-data">
                        @csrf
                        @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                    <br>
                                    <p class="text-sm">{{ session('files') }}</p>
                                </div>
                            </div>
                        </div>
                        @endif




                        <div>
                            <x-jet-label for="url_attestation" value="{{ __('Attestation de votre stagiaire :') }}" />
                            <input type="file" name="url_attestation" id="url_attestation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>


                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Upload') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>