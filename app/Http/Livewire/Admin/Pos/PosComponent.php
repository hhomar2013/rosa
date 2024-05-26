<?php

namespace App\Http\Livewire\Admin\Pos;

use App\Models\Categories;
use App\Models\empoloyee;
use App\Models\order;
use App\Models\posRegister;
use App\Models\product;
use Livewire\Component;

class PosComponent extends Component
{

    public $order_id,$pos_register,$cash=0,$children =[],$productShow=[],$emp=[];

    public function mount(){

        $pos_id =get_pose_regester();
        if($pos_id == 0){
        $this->pos_register = false;
        }else{
            $this->pos_register = true;
        }
    }

    public function get_child($id){
        $this->children = Categories::query()->where('parent_id',$id)->get();
        // dd($this->children );
    }

    public function get_product($id){
        $this->productShow = product::query()->where('cat_id',$id)->get();
    }



    public function all_product($id){
        $this->get_child($id);
        $this->get_product($id);
    }

    public function open_casher(){
        $pos= posRegister::query()->create([
            'startMoney'=>$this->cash,
            'user_id'=>auth()->id(),
        ]);
        $this->pos_register = true;
    }
    public function render()
    {

        $pos_id =get_pose_regester();

        if($pos_id == 0){
            $this->pos_register = false;
        }else{
            $this->pos_register = true;
        }
        $categories = Categories::query()->where('parent_id',null)->get();
        $this->emp = empoloyee::query()->get();
        // dd($categories);
        return view('livewire.admin.pos.pos-component',compact('pos_id','categories'));
    }
}
