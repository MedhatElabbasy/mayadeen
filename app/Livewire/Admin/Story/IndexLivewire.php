<?php

namespace App\Livewire\Admin\Story;

use App\Models\Story;
use Livewire\Component;
use WithPagination;
class IndexLivewire extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $title, $description, $content, $modelId;

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
        ];
    }
    protected $messages = [
        'title.required' => 'حقل العنوان مطلوب.',
        'description.required' => 'حقل الوصف مطلوب.',
        'content.required' => 'حقل المحتوى مطلوب.',
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
        $this->modelId = null;
    }

    ##################
    public function saveStory()
    {
        $this->validate();
        $story = new Story();
        $story->title = $this->title;
        $story->description = $this->description;
        $story->content = $this->content;
        $story->save();
        $this->dispatch('close-modal');
        $this->resetVars();
        session()->flash('message', 'تم اضافة الاقصوصة بنجاح');
    }
    ##################
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    ##################   Update Story
    public function editStory(int $storyId)
    {
        $story = Story::find($storyId);
        if ($story) {

            $this->modelId = $storyId;
            $this->title = $story->title;
            $this->description = $story->description;
            $this->content = $story->content;
        } else {
            // return redirect()->to('/livewire.admin.main-category-livewire');
        }
    }
    ##################
    public function updateStory()
    {
        $validatedData = $this->validate();
        Story::where('id', $this->modelId)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
        ]);
        session()->flash('message', 'تم تعيل الأقصوصة بنجاح ');
        $this->resetVars();
        $this->dispatch('close-modal');
    }

    ##################  Dlete Story
    public function getDeleteStory(int $storyId)
    {
        $this->modelId = $storyId;
    }

    public function deleteStory()
    {
        Story::find($this->modelId)->delete();
        session()->flash('message', 'تم حذف الأقصوصة بنجاح ');
        $this->dispatch('close-modal');
        $this->resetVars();
    }
    ##################  Render
    public function render()
    {
        $stories = Story::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.story.index-livewire', [
            'stories' => $stories,
        ]);
    }
}
