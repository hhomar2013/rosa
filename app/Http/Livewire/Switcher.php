<?php
namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Switcher extends Component
{
    public Model $model;
    public string $field;
    public bool $isPublished;

    public function mount(){
        $this->isPublished = (bool) $this->model->getAttribute($this->field);
    }
    public function render()
    {
        return view('livewire.switcher');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
        session()->flash('message', 'Status Updated Successfully.');
    }
}
