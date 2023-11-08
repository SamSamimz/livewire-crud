<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required','email')]
    public $email;
    #[Rule('required','min:4','max:12')]
    public $password;

    public function login() {
        $validated = $this->validate([
         'email' => ['required','email',],
         'password' => ['required','min:4','max:12'],
        ]);
        if(Auth::attempt($validated)) {
            session()->flash('message', 'Login Successfully');
            return redirect()->route('home');
        }else {
            session()->flash('message', 'Invalid Information');
            return redirect()->route('login');
        };
        $this->reset();
     }

    public function render()
    {
        return view('livewire.login');
    }
}
