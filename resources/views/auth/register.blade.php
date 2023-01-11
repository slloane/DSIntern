<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{role_id: 2}" background-color="hsl(180, 98%, 31%)">
            @csrf

            <img src="{{asset('images/ministere.png')}}" margin-top="20px" height = "5px"width = "5px" alt="Logo ministere" class="ministere">

            <b margin-left ="20px"><pre>                 DSIntern

            </pre><b>

            <div>
                <x-jet-label for="name" value="{{ __('Nom complet :') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email :') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe :') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmez votre mot de passe :') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Vous etes :') }}" />
                <select name="role_id" x-model="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="2">Candidat de stage</option>
                    <option value="3">Responsable </option>
                </select>
            </div>

            <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="intern_formation" value="{{ __('Formation professionnelle :') }}" />
                <x-jet-input id="intern_formation" class="block mt-1 w-full" type="text" :value="old('intern_formation')" name="intern_formation" />
            </div>

            

            <div class="mt-4" x-show="role_id == 3">
                <x-jet-label for="hr_organisme" value="{{ __('Organisme :') }}" />
                <x-jet-input id="hr_organisme" class="block mt-1 w-full" type="text" :value="old('hr_organisme')" name="hr_organisme" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà inscrit ?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __("S'inscrire") }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
