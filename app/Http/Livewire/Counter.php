<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
class Counter extends Component
{   public $count=1;
	public $idd;
	
	
	public function increment()
	{
		if($this->count<5)
		{
			$this->count++;
		}
		
		$this->idd=Str::of(url()->previous())->explode('/')[4];

	}
	public function decrement()
	{if($this->count>1)
		{
		$this->count--;
		}
	}
	public function publish($itemid,$userid,$count)
	{
	     DB::table('ratings')
               ->updateOrInsert(
	        ['itemid' => $itemid,'userid' => $userid],
	        ['votes' => $count]
	    );
	}
    public function render()
    {
        return view('livewire.counter',['count'=>$this->count,
        	                            'idd'=>$this->idd]);
    }
}
