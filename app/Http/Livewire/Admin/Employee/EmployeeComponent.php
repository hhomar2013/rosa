<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\empoloyee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EmployeeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $update = false;
    public $search = '';
    public $name,$phone,$address,$salary,$emp_id;
    public $listeners =[
        'delete_emp'=>'destroy',
        'refresh_emp' =>'$refresh'
    ];


    private function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->salary = '';
        $this->emp_id = '';
        $this->update = false;
    }

    public function cancel()
    {
        $this->reset();
        $this->update = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($id){
        $this->reset();
        $emp = empoloyee::query()->findOrFail($id);
        $this->name = $emp->name;
        $this->phone = $emp->phone;
        $this->address = $emp->address;
        $this->salary = $emp->salary;
        $this->emp_id = $emp->id;
        $this->update = true;
    }

    public function save()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'phone' => 'required|min:11',
            'address'=> 'required',
            'salary' => 'required'
        ]);
        $emp =  empoloyee::query()->create(
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'salary' => $this->salary,
            ]
        );
        session()->flash('message', 'Employee '. $emp->name .'  Created Successfully.');
        $this->reset();
        $this->emitSelf('refresh_emp');
    }

    public function update()
    {
         $this->validate(
             [
            'name' => 'required',
            'phone' => 'required|min:11',
            'address'=> 'required',
            'salary' => 'required'
            ]);
        try {
            $emp = empoloyee::query()->find($this->emp_id);
            $emp->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'address'=> $this->address,
                'salary' => $this->salary,
            ]);
            session()->flash('message', 'Employee Updated Successfully.');
            $this->resetInputFields();
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }


    }

    public function destroy($id)
    {
        try {
            empoloyee::find($id)->delete();
            session()->flash('message', 'Employee deleted Successfully.');


        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }


    public function render()
    {
        $employee = empoloyee::query()->where('name','like','%'.$this->search.'%')->latest()->paginate(10);
        return view('livewire.admin.employee.employee-component',['employee'=> $employee]);
    }
}
