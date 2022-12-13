<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-black leading-tight">
            Création de votre annonce
        </h1>
    </x-slot>

    <div class="pb-10">
        @livewire('annonces')
    </div>   
</x-app-layout>