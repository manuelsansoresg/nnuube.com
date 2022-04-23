<?php

namespace App\Http\Livewire;

use App\Lib\LMercadoPago;
use App\Models\TitleUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTitleComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTitle = '';
    public $my_titles;

    public function mount($my_titles = false)
    {
        $this->my_titles = $my_titles;
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTitle.'%';
        if ($this->my_titles === false) {
            $title_user = TitleUser::where('titulo', 'like', $searchTerm)
            ->where('status_pay', 1)
            ->join('title_ratings', 'title_ratings.title_user_id', '=', 'title_user.id')
            ->orderBy('rate', 'DESC')
            ->paginate(50);
        } else {
            $title_user = TitleUser::where('user_id', Auth::user()->id)
            ->join('title_ratings', 'title_ratings.title_user_id', '=', 'title_user.id')
            ->where('titulo', 'like', $searchTerm)
            ->where('status_pay', 1)
            ->orderBy('rate', 'DESC')
            ->paginate(50);
        }

        return view('livewire.search-title-component', ['titles' => $title_user]);
    }
  
    
}
