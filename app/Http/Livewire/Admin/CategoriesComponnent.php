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
    public $parent_id = null;
    public $active;
    public $update = false;
    public $search = '';
    public $loading = false;

    public $listeners =[
        'delete_cat'=>'destroy',
         'refresh_categories' =>'$refresh'
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
        $categories = Categories::with('children')->whereNull('parent_id')->where('name','like','%'.$this->search.'%')->latest()->paginate(10);
        return view('livewire.admin.categories-componnent',['categories'=>$categories ,'parent'=>$parent])->layout('layouts.admin_app');
    }

    public function save(){
        $this->loading = true;
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);
        Categories::create([
            'name'=> $this->name,
            'parent_id'=>$this->parent_id,
        ]);
        session()->flash('message', 'Category Created Successfully.');
        $this->cancel();
    }

    public function edit($id){
        $category = Categories::findOrFail($id);
        $this->name = $category->name;
        $this->cat_id = $category->id;
        $this->parent_id = $category->parent_id;
        $this->update = true;
    }

    public function cancel()
    {
        $this->loading = false;
        $this->update = false;
        $this->resetInputFields();
    }

    public function update()
    {

            $this->validate();
            try {

              $update_category = Categories::find($this->cat_id);
                if ($this->parent_id != "null"){
                    $update_category->update([
                        'name'=>$this->name,
                        'parent_id'=> $this->parent_id,
                    ]);
                }else{
                    $update_category->update([
                        'name'=>$this->name,
                        'parent_id'=> null,
                    ]);
                }
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
