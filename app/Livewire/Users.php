<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public function delete(User $user) {
        if($user->role != 'admin') {
            $user->delete();
            session()->flash('message', 'User deleted successfully');
            // return redirect()->route('users.index');
        }else {
            abort(401);
        }
    }

    public function render()
    {
        return view('livewire.users',[
            'users' => User::paginate(6),
        ]);
    }
}
