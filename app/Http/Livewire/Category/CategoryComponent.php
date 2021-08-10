<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{
    use WithFileUploads;
    public $categories;
    public $title;
    public $desc;
    public $record_id;
    public $image;
    public $updateMode = false;
    

    public function render()
    {
        $this->categories = Category::latest()->get();
        return view('livewire.category.category');
    }


    protected $rules = [
        'title' => 'required',
        'desc' => 'required',
        'image' =>'image|max:1024|nullable'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }



    public function save()
    {
       $validatedData = $this->validate();
      if($this->image != null)
      {
          $image = $this->image->store('images/category','public');

       Category::create(
          array_merge(
              $validatedData,
              ['image'=>$image]
          )
        );
    } else {
        Category::create($validatedData);
    }
     session()->flash('message', 'Category successfully created!');

      $this->resetInputFields();

    }

public function delete($id){
    Category::destroy($id);
    session()->flash('message', 'Category successfully deleted!');
}

public function edit($id){
    $category = Category::findOrFail($id);
    $this->record_id = $category->id;
    $this->title = $category->title;
    $this->desc = $category->desc;
    $this->updateMode = true;
  
}

public function update(){
    $validatedData = $this->validate();
    $category = Category::findOrFail($this->record_id);
    $category->update($validatedData);
    session()->flash('message', 'Category successfully updated!');
    $this->resetInputFields();
}

public function resetInputFields(){
    $this->title = null;
    $this->desc = null;
    $this->image = null;
    $this->updateMode = false;
}


    
}
