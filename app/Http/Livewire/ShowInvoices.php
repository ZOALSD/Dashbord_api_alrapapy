<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class ShowInvoices extends Component
{
    
    public $count;
    public function render()
    {
        return view('livewire.show-invoices');
    }

    public function mount(){

        $this->count = Card::where('seen',false)->count();

    }
}
