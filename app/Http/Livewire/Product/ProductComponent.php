<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $name;
    public $desc;
    public $image;
    public $category_id;
    public $products;
    public  $updateMode = false;
    public $categories;
    public function render()
    {
        $this->categories = Category::all();
        $this->products = Product::latest()->get();
        return view('livewire.product.product-component');
    }

    protected $rules = [
        'name' => 'required',
        'desc' => 'required|nullable',
        'image' => 'image|max:1024|nullable',
        'category_id' => 'required'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }



    public function save()
    {
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

    public function delete($id)
    {
        if (Product::destroy($id))
            session()->flash('success', 'Product successfully deleted!');
        else
            session()->flash('error', 'Product cannot be deleted!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->record_id = $product->id;
        $this->name = $product->name;
        $this->desc = $product->desc;
        $this->category_id = $product->category->id;
        $this->updateMode = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $product = Product::findOrFail($this->record_id);

        if ($product->update($validatedData))
            session()->flash('info', 'Product successfully updated!');
        else
            session()->flash('error', 'Product cannot be deleted!');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->title = null;
        $this->desc = null;
        $this->image = null;
        $this->updateMode = false;
    }
}
