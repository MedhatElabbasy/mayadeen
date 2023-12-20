<?php

namespace App\Livewire\Admin\HistoricalWriters;
use App\Models\HistoricalWriter;
use Livewire\Component;

class IndexLivewire extends Component
{


    public $event_name, $writer_name,  $Name_poem, $audio_file;


    public function amount()
    {
        $this->resetPage();
        

    }

    #it nesscray to make pagnation 

    public function rules()
    {
        return [
            'event_name' => ['required'],
            'writer_name' => ['required'],
            'Name_poem' => ['required'],
            'audio_file' => ['required'],
           
        ];
    }

    protected $messages = [
        'event_name.required' => 'حقل العنوان مطلوب.',
        'writer_name.required' => 'حقل المحتوى مطلوب.',
        'Name_poem.required' => 'حقل المحتوى مطلوب.',
        'audio_file.required' => 'حقل المحتوى مطلوب.',
       
    ];

#need to know !!!!!!!!!!!!
    public function closeModal()
    {
        $this->resetVars();
    }

    public function resetVars()
    {
        $this->event_name = null;
        $this->writer_name = null;
        $this->Name_poem = null;
        $this->audio_file = null;
       
    }
#########complet to know why!!  Name_poem

public function saveHistoricalWriter()
{
    $this->validate();
    $HistoricalWriter = new HistoricalWriter();
    $HistoricalWriter->event_name = $this->event_name;
     $HistoricalWriter->writer_name = $this->writer_name;
     $HistoricalWriter->Name_poem = $this->Name_poem;
     $HistoricalWriter->audio_file = $this->audio_file;
    $HistoricalWriter->save();
    $this->dispatch('close-modal');
    $this->resetVars();
    session()->flash('message', 'تم اضافة الشعر بنجاح');
}

public function deleteStory($HistoricalWriterId)
{
    $HistoricalWriter = HistoricalWriter::findOrFail($HistoricalWriterId);
    $HistoricalWriter->delete();

    session()->flash('message', 'تم حذف الشعر بنجاح');
}


    public function render()
    {
        $HistoricalWriter = HistoricalWriter::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.index-livewire', [
            'HistoricalWriter' => $HistoricalWriter,
        ]);

      
    }
}
