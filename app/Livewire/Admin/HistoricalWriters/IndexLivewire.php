<?php

namespace App\Livewire\Admin\historicalwriters;
use App\Models\HistoricalWriter;
use Livewire\Component;
use Livewire\WithFileUploads; // Add this line for the WithFileUploads trait

class IndexLivewire extends Component

{  use WithFileUploads; 
    public $event_name, $writer_name,  $Name_poem, $audio_file, $modelId;

    public function amount()
    {
        $this->resetPage();

    }


    public function rules(){
        


        return [
            'event_name' => ['required'],
            'writer_name' => ['required'],
            'Name_poem' => ['required'],
            'audio_file' => ['required', 'file'],
        ];
        
    }
    protected $messages = [
        'event_name.required' => 'حقل العنوان مطلوب.',
        'writer_name.required' => 'حقل المحتوى مطلوب.',
        'Name_poem.required' => 'حقل المحتوى مطلوب.',
        'audio_file.required' => 'حقل المحتوى مطلوب.',
       
    ];

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

    public function  saveHistoricalWriter()
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
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function editHistoricalWriter(int $HistoricalWriterId)
    {
        $HistoricalWriter = HistoricalWriter::find($HistoricalWriterId);
    
        if ($HistoricalWriter) {
            $this->modelId = $HistoricalWriterId;
            $this->event_name = $HistoricalWriter->event_name;
            $this->writer_name = $HistoricalWriter->writer_name;
            $this->Name_poem = $HistoricalWriter->Name_poem;
            // Set the audio_file as an instance of UploadedFile
            $this->audio_file = $this->convertToUploadedFile($HistoricalWriter->audio_file);
        } else {
            // Handle if the HistoricalWriter is not found
            // You can add your own logic here, such as redirecting or showing an error
        }
    }
    
    private function convertToUploadedFile($filePath)
    {
        $storagePath = storage_path('app/public/' . $filePath);
        
        // Check if the file exists
        if (file_exists($storagePath)) {
            return $this->upload($storagePath);
        }
    
        return null;
    }

public function updateHistoricalWriter()
{
    $validatedData = $this->validate();

    // Handle file upload
    if ($this->audio_file) {
        $validatedData['audio_file'] = $this->audio_file->store('audio_files', 'public');
    }

    HistoricalWriter::where('id', $this->modelId)->update([
        'event_name' => $validatedData['event_name'],
        'writer_name' => $validatedData['writer_name'],
        'Name_poem' => $validatedData['Name_poem'],
        'audio_file' => $validatedData['audio_file'] ?? null, // Use null if no new file is provided
    ]);

    session()->flash('message', 'تم تعديل القصيدة بنجاح');
    $this->resetVars();
    $this->dispatch('close-modal');
}

public function getdeleteHistoricalWriter(int $HistoricalWriterId)
{
    $this->modelId = $HistoricalWriterId;
}
public function deleteHistoricalWriter($HistoricalWriterId)
{
    $HistoricalWriter = HistoricalWriter::findOrFail($HistoricalWriterId);
    $HistoricalWriter->delete();

    session()->flash('message', 'تم حذف القصيده بنجاح');
}

public function render()
    {
        $HistoricalWriter = HistoricalWriter::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.historicalwriters.index-livewire', [
            'HistoricalWriter' => $HistoricalWriter,
        ]);

      
    }

}






