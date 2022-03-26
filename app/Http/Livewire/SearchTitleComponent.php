<?php

namespace App\Http\Livewire;

use App\Models\TitleUser;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTitleComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTitle = '';

    public function render()
    {
        $searchTerm = '%'.$this->searchTitle.'%';
        return view('livewire.search-title-component', ['titles' => TitleUser::where('titulo', 'like', $searchTerm)
        ->paginate(50)]);
    }
  
    
}
