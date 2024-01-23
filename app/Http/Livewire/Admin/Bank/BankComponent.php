<?php

namespace App\Http\Livewire\Admin\Bank;

use App\Models\bank;
use Livewire\Component;
use Livewire\WithPagination;

class BankComponent extends Component
{
    use WithPagination;
    public $name,$start_money,$end_money,$update=false,$bankId;

    protected $listeners = ['delete_bank'=>'destroy'];
    public function save()
    {
         $validate =  $this->validate([
                'name'=> 'required',
                'start_money'=> 'required',
                'end_money'=> 'required',
            ]);
            $bank = bank::query()->create($validate);
            if ($bank){
                session()->flash('message', 'Bank' . $bank->name . ' Created Successfully.');
                $this->reset();
            }

    } //save

    public function edit($id)
    {
        $bank = bank::query()->findOrFail($id);
        $this->name = $bank->name;
        $this->start_money = $bank->start_money;
        $this->end_money = $bank->end_money;
        $this->bankId = $bank->id;
        $this->update = true;
    }

    public function update()
    {
        $id = $this->bankId;
        $validate =  $this->validate([
            'name'=> 'required',
            'start_money'=> 'required',
            'end_money'=> 'required',
        ]);
        $bank = bank::query()->findOrFail($id);
        $bank->update($validate);
        session()->flash('message', 'Bank Updated Successfully.');
        $this->cancel();
    }

    public function cancel()
    {
        $this->reset();
        $this->update = false;
    }

    public function destroy($id)
    {
        $bank = bank::query()->findOrFail($id);
        $bank->delete();
        session()->flash('message', 'Bank Deleted Successfully.');
        $this->cancel();
    }


    public function render()
    {
        $bank = bank::query()->paginate(10);
        return view('livewire.admin.bank.bank-component',['bank'=>$bank]);
    }
}
