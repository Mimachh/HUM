<?php

namespace App\Http\Livewire;

use App\Models\Ville;
use App\Models\Annonce;
use Livewire\Component;
use App\Models\Condition;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Annonces extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    public $annonces;
    public $conditions;
    public $villes;
    public $user_id;
    public $email;
    
    public $titre, $nom, $prenom, $surface, $ville_id, 
            $photo, $start_date, $end_date, $places, $vetements, $draps,
            $argent, $nourriture, $infos, $phone, $condition_id;


    public function mount()
    {
        $this->annonces = Annonce::all();
        $this->conditions = Condition::all();
        $this->villes = Ville::all();
        $this->user_id = auth()->user()->id;
        $this->email = auth()->user()->email;
    }


    public function index()
    {
        $annonces = Annonce::paginate(8);
      
        
        return view('annonces.index', ['annonces' => $annonces]);
    }
    

    /* Séparation des pages */

    public $currentPage = 1;
    public $pages = [1=>1, 2=>2, 3=>3];

    public function goToPreviousPages()
    {
        $this->currentPage--;
    }

    public function goToNextPages()
    {
        $this->currentPage++;
    }

    public function create()
    {
        return view('annonces.create');
    }

    protected function rules()

    {
        return [

            'titre' => 'required|min:6',
            'nom' =>  'required|max:30',
            'prenom' => 'required|max:30',
            'condition_id' => 'required|integer',
            'surface' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'places' => 'required|numeric',
            'vetements' => 'nullable|boolean',
            'draps' => 'nullable|boolean',
            'nourriture' => 'nullable|boolean',
            'argent' => 'nullable|boolean',
            'infos' => 'nullable|max:255',
            'phone' => 'required|max:10',
            'email' => 'required|email',
            'ville_id' => 'required|min:1',
        ];
    }

    

    public function store()
    {
    
        $this->validate();

        $name_file = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('annonces_photos', $name_file); 

        $annonce = Annonce::create([
            'titre' => $this->titre,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'condition_id' => $this->condition_id,
            'surface' => $this->surface,
            'ville_id' => $this->ville_id, 
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'places' => $this->places,
            'vetements' => $this->vetements,
            'draps' => $this->draps,
            'nourriture' => $this->nourriture,
            'argent' => $this->argent,
            'infos' => $this->infos,
            'phone' => $this->phone,
            'email' => $this->email,
            'user_id' => $this->user_id,
            'photo' => $name_file, 
        ]);
    }

    public function show(Annonce $annonce)
    {
        return view('annonces.show', compact('annonce'));
    }

    public function render()
    {
        return view('livewire.annonces');
    }
}
