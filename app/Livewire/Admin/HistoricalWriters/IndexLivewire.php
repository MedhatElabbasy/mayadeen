<?php

namespace App\Livewire\Admin\historicalwriters;
use App\Models\HistoricalWriter;
use Livewire\Component;
use Livewire\WithFileUploads; 
class IndexLivewire extends Component

{  use WithFileUploads; 
    public  $writer_name,  $writer_img, $About_writer, $modelId;

    public function amount()
    {
        $this->resetPage();

    }


    public function rules(){
        


        return [
            'writer_name' => ['required'],
            'writer_img' => ['required', 'file', 'image', 'max:10240'], 
            'About_writer' => ['required'],
        ];
        
    }
    protected $messages = [
        'writer_name.required' => 'حقل العنوان مطلوب.',
        'writer_img.required' => 'حقل المحتوى مطلوب.',
        'About_writer.required' => 'حقل المحتوى مطلوب.',
       
    ];

    public function closeModal()
    {
        $this->resetVars();
    }

    public function resetVars()
    {
        $this->writer_name = null;
        $this->writer_img = null;
        $this->About_writer = null;
    }


 public function saveHistoricalWriter()
 {

    $this->validate([
        'writer_name' => ['required'],
        'writer_img' => ['required', 'image', 'max:10240'],
        'About_writer' => ['required'],
    ]);
 

  


    $this->writer_img = $this->writer_img->store('images');
    HistoricalWriter::create([
        'writer_name' => $this->writer_name,
        'writer_img' => $this->writer_img,
        'About_writer' => $this->About_writer,
    ]);

    $this->dispatch('closeModal');
$this->resetVars();
    session()->flash('message', 'تم اضافة الشعر بنجاح');

 }
 

 public function updated($fields)
    {
        $this->validateOnly($fields);
    }
  
    public function editHistoricalWriter(int $historicalWriterId)
    {
       
        $this->resetVars();

        $historicalWriter = HistoricalWriter::find($historicalWriterId);
    
        if ($historicalWriter) {
            $this->modelId = $historicalWriterId;
            $this->writer_name = $historicalWriter->writer_name;
            $this->writer_img = $historicalWriter->writer_img; 
            $this->About_writer = $historicalWriter->About_writer; 
        } else {
            return response()->json(['error' => ' لا يوجد كاتب  '], 404);
        } 


        $this->resetVars();
        $historicalWriter = HistoricalWriter::find($historicalWriterId);

        if ($historicalWriter) {
            $this->modelId = $historicalWriterId;
            $this->writer_name = $historicalWriter->writer_name;
            $this->About_writer = $historicalWriter->About_writer;
        } else {
            return response()->json(['error' => 'لا يوجد كاتب'], 404);
        }

    }
    
   
    public function updateHistoricalWriter()
{
    $validatedData = $this->validate([
        'writer_name' => ['required'],
       'writer_img' => ['required', 'image', 'max:10240'], 
        'About_writer' => ['required'],
    ]);
    $validatedData['writer_img'] = $this->writer_img->store('writer_images', 'public');

    
    $historicalWriter = HistoricalWriter::find($this->modelId);

    if ($historicalWriter) {
        // Handle file upload for writer_img
        $validatedData['writer_img'] = $this->writer_img->store('writer_images', 'public');

        $historicalWriter->update([
            'writer_name' => $validatedData['writer_name'],
            'writer_img' => $validatedData['writer_img'],
            'About_writer' => $validatedData['About_writer'],
        ]);

        session()->flash('message', 'تم تعديل القصيدة بنجاح');
        $this->resetVars();
        $this->dispatch('close-modal');
    } else {
     
        session()->flash('error', 'خطأ: لم يتم العثور على القصيدة');
    }
}

    


public function deleteHistoricalWriter(int $historicalWriterId)
{
    $HistoricalWriter = HistoricalWriter::findOrFail($historicalWriterId);
    $HistoricalWriter->delete();

    session()->flash('message', 'تم حذف القصيده بنجاح');
    $this->resetVars(); 
}


public function render()
    {
        $HistoricalWriter = HistoricalWriter::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.historicalwriters.index-livewire', [
            'HistoricalWriter' => $HistoricalWriter,
        ]);

      
    }

}