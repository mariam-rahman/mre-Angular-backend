<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class CategoryComponent extends Component
{
    use WithFileUploads;
    public $categories;
    public $title;
    public $desc;
    public $record_id;
    public $image;
    public $updateMode = false;

    //Get record list
    public function render()
    {
        $this->categories = Category::latest()->get();

        return view('livewire.category.category');
    }
    //End 


    //Data validation
    protected $rules = [
        'title' => 'required',
        'desc' => 'required',
        'image' => 'image|max:1024|nullable'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    //End data validation

    //Store record
    public function save()
    {
        $validatedData = $this->validate();
        if ($this->image != null) {
            $image = $this->image->store('images/category', 'public');

            $category = Category::create(
                array_merge(
                    $validatedData,
                    ['image' => $image]
                )
            );
        } else {
            $category =  Category::create($validatedData);
        }
        if ($category)
            session()->flash('success', 'Category successfully created!');
        else
            session()->flash('error', 'Category cannot be created!');
        $this->resetInputFields();
    }
    //End store record

    //Delete record
    public function delete($id)
    {
        $category = Category::find($id);
        $oldimage = "storage/" . $category->image;
    
        if ($category->delete())
        {
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }

            session()->flash('success', 'Category successfully deleted!');
        }
        else
            session()->flash('error', 'Category cannot be deleted!');
    }
    //End delete

    //Edit record
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $this->record_id = $category->id;
        $this->title = $category->title;
        $this->desc = $category->desc;
        $this->updateMode = true;
    }
    //End edit

    //Update record
    public function update()
    {
        $updateCategory = null;
        $validatedData = $this->validate();

        $category = Category::findOrFail($this->record_id);

        if ($this->image != null) {
            $image = $this->image->store('images/category', 'public');
            $oldimage = "storage/" . $category->image;
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            $updateCategory = $category->update(array_merge(
               $validatedData,
               ['image'=>$image]
                ));
            }
            else 
            {
            $updateCategory = $category->update(array_merge(
                    $validatedData,
                    ['image'=>$category->image]
                     ));
            }

            if($updateCategory)
             session()->flash('info', 'Category successfully updated!');
             else
            session()->flash('error', 'Category cannot be updated!');
    
            $this->resetInputFields();
}
//End update

    //Clean input fields
    public function resetInputFields()
    {
        $this->title = null;
        $this->desc = null;
        $this->image = null;
        $this->updateMode = false;
    }
    //End


}
