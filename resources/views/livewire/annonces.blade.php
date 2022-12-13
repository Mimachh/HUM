<form class="w-full max-w-lg mx-auto">
  <div class="flex flex-wrap -mx-3 mb-6 space-y-5">
    
    @if($currentPage === 1)
    <!-- Titre -->
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titre">
        Titre de l'annonce
      </label>
      <input wire:model="titre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="titre" type="text" placeholder="Titre de votre annonce">
      <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    </div>

    <!-- Nom -->
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nom">
        Nom de famille
      </label>
      <input wire:model="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nom" type="text" placeholder="Nom de famille">
    </div>

    <!-- Prénom -->
    <div class="w-full px-3 mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prenom">
        Prénom
      </label>
      <input wire:model="prenom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prenom" type="text" placeholder="Prénom">
    </div>

    @elseif($currentPage === 2)

    <!-- Conditions -->
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="conditions">
        Conditions d'accueil
      </label>
      <div class="relative">
        <select wire:model="condition_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="conditions">
          <option value="">Selectionnez une option</option>
          @foreach($conditions as $condition)
          <option value="{{ $condition->id }}">{{ $condition->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Surface -->
    <div class="w-full px-3 mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="surface">
        Surface proposée (en m2)
      </label>
      <input wire:model="surface" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="surface" type="number">
    </div>

    <!-- Ville -->
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ville">
        Ville
      </label>
      <div class="relative">
        <select wire:model="ville_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="ville">
          <option value="">Choisissez une ville</option>
          @foreach($villes as $ville)
          <option value="{{ $ville->id }}">{{ $ville->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Photo -->
    <div class="w-full px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="photo">
        Photo du bien
      </label>
      <input class="text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="photo" type="file" id="photo" wire:model="photo" wire:loading.attr="disabled"/>
      <div wire:loading wire:target="photo" class="text-sm text-gray-500 italic">Chargement...</div>
    </div>

    <!-- Dates-->
    <div class="w-full px-3 mb-6 flex justify-between">
      <!-- Date début-->
      <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="start_date">
          Date de début 
        </label>
        <input wire:model="start_date" class="appearance-none bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="start_date" type="date">
      </div>
      <!-- Date fin-->
      <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="end_date">
          Date de fin
        </label>
        <input wire:model="end_date" class="appearance-none bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="end_date" type="date">
      </div>
    </div>

    @elseif($currentPage === 3)
    <!-- Nombre de places -->
    <div class="w-full px-3 mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="place">
        Nombre de places dont vous disposez
      </label>
      <input wire:model="place" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="place" type="number">
    </div>

    <!-- Checkboxes -->
    <div class="w-full  px-3 mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="vetements">
        Pouvez-vous fournir des vêtements à vos hôtes?
      </label>
      <input wire:model="vetements" class="rounded-full border border-gray-200" id="vetements" type="checkbox">
    
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="draps">
        Pouvez-vous fournir des draps à vos hôtes?
      </label>
      <input wire:model="draps" class="rounded-full border border-gray-200" id="draps" type="checkbox">
    
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nourriture">
        Pouvez-vous fournir de la nourriture à vos hôtes?
      </label>
      <input wire:model="nourriture" class="rounded-full border border-gray-200" id="nourriture" type="checkbox">
    
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="argent">
        Pouvez-vous fournir de l'argent à vos hôtes?
      </label>
      <input wire:model="argent" class="rounded-full border border-gray-200" id="argent" type="checkbox">

    </div>

    <!-- Infos complémentaires -->
    <div class="w-full px-3 mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="infos">
        Informations complémentaires à fournir à vos hôtes 
      </label>
      <textarea wire:model="infos" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="infos"></textarea>
    </div>

    <!-- Phone -->
    <div class="w-full px-3 mb-6">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
        Votre numéro de téléphone pour être contacté
      </label>
      <input wire:model="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone" type="text">
    </div>
@endif
</div>
    <!-- Boutons -->
    <div class="flex items-center justify-between px-4 py-8 text-right sm:px-6 mx-8"> 
      @if($currentPage === 1)
          <div></div>
      @else
          <x-jet-button class="bg-blue-600" wire:click='goToPreviousPages' type="button" >Retour</x-jet-button>
      @endif
      @if ($currentPage === count($pages))
          <x-jet-button class="bg-red-600" type="submit">Valider</x-jet-button>
      @else
          <x-jet-button class="bg-orange-700" wire:click="goToNextPages" type="button">Suivant</x-jet-button>
      @endif

  </div>

</form>
