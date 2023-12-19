<?php

namespace App\Livewire\Admin\Story;

use App\Models\Story;
use Livewire\Component;

class IndexLivewire extends Component
{

    public $title, $description, $content;

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
            'content' => ['required'],
        ];
    }
    protected $messages = [
        'title.required' => 'حقل العنوان مطلوب.',
        // 'discription.required' => 'حقل الوصف مطلوب.',
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
    public function deleteStory($storyId)
    {
        $story = Story::findOrFail($storyId);
        $story->delete();

        session()->flash('message', 'تم حذف الاقصوصة بنجاح');
    }
    ##################
    public function render()
    {
        $stories = Story::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.story.index-livewire', [
            'stories' => $stories,
        ]);
    }
}