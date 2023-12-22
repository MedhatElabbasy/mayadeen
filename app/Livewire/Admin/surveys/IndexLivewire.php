<?php

namespace App\Livewire\Admin\Surveys;

use App\Models\survey;
use Livewire\Component;

class IndexLivewire extends Component
{
    protected $paginationTheme = 'bootstrap';
    // public $name , $email , $phone , $facilities, $organization, $events, $access ;

    public function amount()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.admin.surveys.index-livewire');
        $surveys = survey::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.surveys.index-livewire', [
            'surveys' => $surveys,
        ]);
    }
}
