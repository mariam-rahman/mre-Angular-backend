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
        'image' =>'image|max:1024'
    ];
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
       $validatedData = $this->validate();
  

     $image = $this->image->store('images/category','public');

       Category::create(
          array_merge(
              $validatedData,
              ['image'=>$image]
          )
        );
        session()->flash('message', 'Category successfully created.');
   

        return redirect(route('category.index'));
    }


    
}
