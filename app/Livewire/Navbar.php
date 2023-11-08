<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $isAdmin = false;
    public function mount() {
        if(Auth::user()) {
            $this->isAdmin = Auth::user()->role == 'admin';
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
