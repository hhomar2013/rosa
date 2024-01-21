<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoriesComponnent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $name ,$cat_id;
    // public $parent_id = 0;
    public $active;
    public $update = false;
    public $search = '';

    public $listeners =[
        'delete_cat'=>'destroy'
    ];


    protected $rules = [
        'name' => 'required',
        // 'email' => 'required|email',
    ];

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $parent = Categories::whereNull('parent_id')->get();
        $categories = Categories::with('children')->whereNull('parent_id')->where('name','like','%'.$this->search.'%')->latest()->paginate(4);
        return view('livewire.admin.categories-componnent',['categories'=>$categories ,'parent'=>$parent])->layout('layouts.admin_app');
    }

    public function save(){
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);
        Categories::create($validatedDate);
        session()->flash('message', 'Category Created Successfully.');
       $this->resetInputFields();

    }

    public function edit($id){
        $category = Categories::findOrFail($id);
        $this->name = $category->name;
        $this->cat_id = $category->id;
        $this->update = true;
    }

    public function cancel()
    {
        $this->update = false;
        $this->resetInputFields();
    }

    public function update()
    {
            $this->validate();

            try {
              $update_category = Categories::find($this->cat_id);
                $update_category->update([
                    'name'=>$this->name
                ]);
                session()->flash('message', 'Category Updated Successfully.');
                $this->cancel();
            } catch (\Exception $e) {
                session()->flash('error', $e);
            }
    }

    public function destroy($id)
    {

        try {
            Categories::find($id)->delete();
            session()->flash('message', 'Category deleted Successfully.');
            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }


}
