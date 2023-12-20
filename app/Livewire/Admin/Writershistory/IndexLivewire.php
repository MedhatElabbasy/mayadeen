<?php

namespace App\Livewire\Admin\Writershistory;

use App\Models\WriterHistory;
use Livewire\Component;
use WithPagination;

class IndexLivewire extends Component
{

    protected $paginationTheme = 'bootstrap';
    public $title, $description, $content, $auther_name,$about_auther,$modelId;

    ################

    public function amount()
    {
        $this->resetPage();

    }
    ################

    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'content' => ['required'],
            'auther_name' => ['required'],
            'about_auther' => ['required'],
        ];
    }
    protected $messages = [
        'title.required' => 'حقل العنوان مطلوب.',
        'description.required' => 'حقل الوصف مطلوب.',
        'content.required' => 'حقل المحتوى مطلوب.',
        'auther_name.required' => 'حقل الكاتب مطلوب.',
        'about_auther.required' => 'حقل معلزمات عن  مطلوب.',
    ];
    ################
    public function closeModal()
    {
        $this->resetVars();
    }
    ################
    public function resetVars()
    {
        $this->title = null;
        $this->description = null;
        $this->content = null;
        $this->auther_name = null;
        $this->about_auther = null;
        $this->modelId = null;
    }

    ##################
    public function saveWriter()
    {
        $this->validate();
        $writer = new WriterHistory();
        $writer->title = $this->title;
        $writer->description = $this->description;
        $writer->content = $this->content;
        $writer->auther_name = $this->auther_name;
        $writer->about_auther = $this->about_auther;
        $writer->save();
        $this->dispatch('close-modal');
        $this->resetVars();
        session()->flash('message', 'تم اضافة القصيدة بنجاح');
    }
    ##################
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    ##################   Update Story
    public function editWriter(int $writerId)
    {
        $writer = WriterHistory::find($writerId);
        if ($writer) {

            $this->modelId = $writerId;
            $this->title = $writer->title;
            $this->description = $writer->description;
            $this->content = $writer->content;
            $this->auther_name = $writer->auther_name;
            $this->about_auther = $writer->about_auther;
        } else {
            // return redirect()->to('/livewire.admin.main-category-livewire');
        }
    }
    ##################
    public function updateWriter()
    {
        $validatedData = $this->validate();
        WriterHistory::where('id', $this->modelId)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
            'auther_name' => $validatedData['auther_name'],
            'about_auther' => $validatedData['about_auther'],
        ]);
        session()->flash('message', 'تم تعديل القصيدة بنجاح ');
        $this->resetVars();
        $this->dispatch('close-modal');
    }

    ##################  Dlete Story
    public function getDeleteWriter(int $writerId)
    {
        $this->modelId = $writerId;
    }

    public function deleteWriter()
    {
        WriterHistory::find($this->modelId)->delete();
        session()->flash('message', 'تم حذف القصيدة بنجاح ');
        $this->dispatch('close-modal');
        $this->resetVars();
    }
    ##################  Render
    public function render()
    {
        $writers = WriterHistory::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.writershistory.index-livewire',[
            'writers'=>$writers,
        ]);
    }
}