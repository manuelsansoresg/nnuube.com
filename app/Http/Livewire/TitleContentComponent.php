<?php

namespace App\Http\Livewire;

use App\Models\TitleComment;
use App\Models\TitleRating;
use App\Models\TitleUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TitleContentComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $title;
    public $rate;
    public $comment;

    protected $listeners = [
        'setRate'
    ];


    public function mount($title_id)
    {
        $this->title    = TitleUser::find($title_id);
        $this->rate     = TitleRating::getRateByTitle($title_id);
        
    }

    public function render()
    {
        $comments = TitleComment::where('title_user_id', $this->title->id)
        ->orderBy('id', 'DESC')
        ->paginate(50);
        return view('livewire.title-content-component', ['comments' => $comments]);
    }

    public function setRate($title_id)
    {
        $this->rate     = TitleRating::getRateByTitle($title_id);
        $this->emit('setRateJavascript', $this->rate);
    }

    public function storeComment()
    {
        $data_comment = array(
            'title_user_id' => $this->title->id,
            'user_id' => Auth::user()->id,
            'comment' => $this->comment
        );
        $comment = new TitleComment($data_comment);
        $comment->save();
        $this->comment = '';
    }

}
