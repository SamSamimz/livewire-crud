<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{
    #[Rule('required','string','max:25')]
    public $name;
    #[Rule('required','email','unique:users,email')]
    public $email;
    #[Rule('required','min:4','max:12')]
    public $password;
    public $password_confirmation;

    public function register() {
       $validated = $this->validate([
        'name' => ['required','max:25','string'],
        'email' => ['required','email','unique:users,email'],
        'password' => ['required','confirmed','min:4','max:12'],
       ]);
       $validated['password'] = Hash::make($validated['password']);
       User::create($validated);
       $this->reset();
       session()->flash('message', 'Registered Successfully');
       return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}