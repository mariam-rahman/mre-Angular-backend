<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductComponent extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public $name;
    public $desc;
    public $image;
    public $category_id;
    public $products;
    public  $updateMode = false;
    public $categories;
    public $record_id;

    //Get record list
    public function render()
    {
       
        $this->categories = Category::all();
        $this->products = Product::latest()->get();
        return view('livewire.product.product-component');
    }
   //End
public function mount(){
    $this->authorize('viewAny', Product::class);
}
   //Data validation
   protected $rules = [
    'name' => 'required',
    'desc' => 'required',
    'image' => 'image|max:1024|nullable',
    'category_id' => 'required',
       ];

     public function updated($property)
    {
    $this->validateOnly($property);
     }
   //End
    

   //Store record
    public function save()
    {
        $this->authorize('create', Product::class);
        $validatedData = $this->validate();
        if ($this->image != null) {
            $image = $this->image->store('images/product', 'public');
            $product = Product::create(
                array_merge(
                    $validatedData,
                    ['image' => $image]
                )
            );
           
        } else {
            $product =  Product::create($validatedData);
        }
        if ($product)
            session()->flash('success', 'Product successfully created!');
        else
            session()->flash('error', 'Product cannot be deleted!');
        $this->resetInputFields();
    }
    //End store

    //Delete record
    public function delete($id)
    {
        $product = Product::find($id);
        $oldimage = "storage/" . $product->image;
        if ($product->delete())
        {
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            session()->flash('success', 'Product successfully deleted!');
        }
        else
            session()->flash('error', 'Product cannot be deleted!');
    }
    //End delete

    //Edit record
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);
        $this->record_id = $product->id;
        $this->name = $product->name;
        $this->desc = $product->desc;
        $this->category_id = $product->category->id;
        $this->updateMode = true;
    }
    //End edit

    //Update record
    public function update()
    {
        $updateProduct = null;
        $validatedData = $this->validate();

        $product = Product::findOrFail($this->record_id);

        if ($this->image != null) {
            $image = $this->image->store('images/product', 'public');
            $oldimage = "storage/" . $product->image;
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            $updateProduct = $product->update(array_merge(
               $validatedData,
               ['image'=>$image]
                ));
            }
            else 
            {
            $updateProduct = $product->update(array_merge(
                    $validatedData,
                    ['image'=>$product->image]
                     ));
            }

        if ($updateProduct)
            session()->flash('info', 'Product successfully updated!');
        else
            session()->flash('error', 'Product cannot be deleted!');

        $this->resetInputFields();
    }
    //End update

    public function resetInputFields()
    {
        $this->name = null;
        $this->category = null;
        $this->image = null;
        $this->desc = null;
        $this->category_id = null;
        $this->updateMode = false;
    }
}
