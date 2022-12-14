<x-app-layout>
   
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-200 leading-tight text-center">
            {{ __('Les annonces en ligne') }}
        </h1>
    </x-slot>
 
        <div class="md:flex-wrap md:flex md:mx-32 xs:mx-auto mt-5">
            <div class="bg-white">
                <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                    
                    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                 
      
                        @foreach($annonces as $annonce)
   
                              

                        <!-- Card verticale -->
        
       
        

                        <div class="group border px-2 py-3 rounded shadow hover:shadow-lg">
                                        <a href="{{ route('annonces.show', $annonce) }}">
                                            <div class="aspect-w-1 aspect-h-1  overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                                <img src="{{ asset('storage/annonces_photos/' . $annonce->photo) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="mb-2 shadow-xl mx-auto h-64 md:h-40 rounded-lg object-cover object-center group-hover:opacity-75">
                                            </div>
                                        </a>
                                        <div class="flex justify-between mt-4">
                                            <a href="{{ route('annonces.show', $annonce) }}">
                                                <h2 class="text-sm text-lg text-gray-700">{{ $annonce->titre }}</h2>
                                                <p class="text-sm text-gray-700">{{ $annonce->nom }} {{ $annonce->prenom }}</p>
                                            </a>
                                            @auth
                                                @if($annonce->user_id !== auth()->user()->id)
                                                    <div class="flex items-center">
                                                        <livewire:ad-fav :annonce="$annonce">
                                                        @if($annonce->fav->count() > 0)
                                                            <div>
                                                                ({{$annonce->fav->count()}})
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif 
                                            @endauth
                                            @guest 
                                                <livewire:ad-fav :annonce="$annonce">
                                            @endguest
                                        </div>

                                        <a href="{{ route('annonces.show', $annonce) }}">
                                            
                                            <!-- Prix -->
                                                <p class="my-1 text-lg font-medium text-gray-900 pb-3">
                                                   
                                                </p>
                                            <!-- Fin prix-->

                                            <!-- Dispo -->
                                            @if($annonce->start_date && $annonce->end_date !== null)
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                                </svg>
                                                <p class="text-sm text-gray-600 pb-3 pl-1">
                                                    Disponible du : <span class="text-md text-gray-800">{{ $annonce->start_date }}</span>  
                                                    au : <span class="text-md text-gray-800">{{ $annonce->end_date }}</span>
                                                </p>
                                            </div>
                                            @endif
                                            <!-- Fin dispo --> 

                                            <!-- Ville -->
                                            @if($annonce->ville_id !== null)
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                                </svg>
                                                <p class="text-sm text-gray-600 pl-1 pb-3"><span class="text-md text-gray-800"> Ville : {{ $annonce->ville->name }}</span></p>    
                                            </div>
                                            @endif
                                            <!--Fin ville -->

                                            <!-- Conditions d'accueil -->
                                            <p class="text-sm text-gray-600 pb-3">Conditions d'accueil :               
                                                <span class="text-sm text-gray-800">{{$annonce->condition->name}}</span>       
                                            </p>
                                            <!-- Fin conditions d'accueil -->

                                            <!-- Surface -->
                                            <p class="text-sm text-gray-600 pb-3">Surface :               
                                                <span class="text-sm text-gray-800">{{$annonce->surface }}/m2</span>       
                                            </p>
                                            <!-- Fin surface -->

                                             <!-- Places -->
                                             <p class="text-sm text-gray-600 pb-3">Nombre de places disponibles :               
                                                <span class="text-sm text-gray-800">{{$annonce->places }}/m2</span>       
                                            </p>
                                            <!-- Fin places -->

                                            <!-- Elements supp pour le show -->
                                           <!-- <p class="text-sm text-gray-600 pb-2">Eléments supplémentaires pouvant être
                                                fournis aux migrants :
                                             
                                                <p class="text-sm text-gray-800">Vêtements : {{ $annonce->vetements ? 'Oui' : 'Non'}}
                                                    Draps : {{ $annonce->draps ? 'Oui' : 'Non'}}
                                                    Nourriture : {{ $annonce->nourriture ? 'Oui' : 'Non'}}
                                                    Argent : {{ $annonce->argent ? 'Oui' : 'Non'}} 
                                                </p>
                                            </p>
                                                -->
                                            <!-- Fin elements supp -->   
                                        </a>    
                                            <div class="flex items-center mt-2">
                                                <span class="flex h-2 w-2 bg-red-600 rounded-full mr-2"></span>
                                                <a class="text-sm" href="{{ route('annonces.show', $annonce) }}">Consulter l'annonce</a>
                                            </div> 
                                        
                        </div>
             

                           
        
                        @endforeach
   
                    </div> 
                    {{$annonces->links()}}
                </div>
            </div>
        </div>
        

              

</x-app-layout>