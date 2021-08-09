<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{
    use WithFileUploads;
   
    public function render()
    {

        return view('livewire.category-component');
    }

    public $title;
    public $desc;
    public $image;

    protected $rules = [
        'title' => 'required',
        'desc' => 'required',
        'image' =>'image|max:1024|nullable'
    ];
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
       
       $validatedData = $this->validate();
  
       if($this->image !=""){
        $image_path = $this->image->store('images/category','public');
        Category::create(array_merge($validatedData,
                                       ['image'=>$image_path]));
    }
    else
    {
        Category::create([
            'title'=>$this->title,
            'desc'=>$this->desc
        ]);
    }

     session()->flash('message', 'Category successfully created.');
   

    }


    
}
