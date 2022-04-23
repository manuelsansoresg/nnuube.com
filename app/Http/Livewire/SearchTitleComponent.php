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
            if ($this->searchTitle !== '') {
                $title_user = TitleUser::select('title_user.id', 'slug', 'imagen', 'title_user.user_id', 'titulo')
                ->where('titulo', 'like', $searchTerm)
                ->where('status_pay', 1)
                ->leftJoin('title_ratings', 'title_ratings.title_user_id', '=', 'title_user.id')
                ->orderBy('rate', 'DESC')
                ->paginate(50);
            } else {
                $title_user = TitleUser::
                select('title_user.id', 'slug', 'imagen', 'title_user.user_id', 'titulo')->where('status_pay', 1)
                ->leftJoin('title_ratings', 'title_ratings.title_user_id', '=', 'title_user.id')
                ->orderBy('rate', 'DESC')
                ->paginate(50);
            }
           
        } else {
            if ($this->searchTitle !== '') {
                $title_user = TitleUser::
                select('title_user.id', 'slug', 'imagen', 'title_user.user_id', 'titulo')->where('title_user.user_id', Auth::user()->id)
                ->leftJoin('title_ratings', 'title_ratings.title_user_id', '=', 'title_user.id')
                ->where('titulo', 'like', $searchTerm)
                ->where('status_pay', 1)
                ->orderBy('rate', 'DESC')
                ->paginate(50);
            } else {
                $title_user = TitleUser::
                select('title_user.id', 'slug', 'imagen', 'title_user.user_id', 'titulo')->where('title_user.user_id', Auth::user()->id)
                ->leftJoin('title_ratings', 'title_ratings.title_user_id', '=', 'title_user.id')
                ->where('status_pay', 1)
                ->orderBy('rate', 'DESC')
                ->paginate(50);
            }
            
        }

        return view('livewire.search-title-component', ['titles' => $title_user]);
    }
  
    
}
