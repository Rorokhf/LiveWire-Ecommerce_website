<?php

namespace App\Http\Livewire\User;


use Livewire\Component;
use app\models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $N_password;
    public $c_password;


    public function update($fields){
        $this->validateOnly($fields,[
            'current_password'=>'required',
            'N_password'=>'required|min:8|confirmed|different:c_password'
        ]);
    }
    public function ChangePassword(){
        $this->validate([
            'current_password'=>'required',
            'N_password'=>'required|min:8|confirmed|different:c_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user=User::findOrFail(Auth::user()->id);
            $user->password=Hash::make($this->password);
            $user->save();
            Session()->flash('message','Password has been Changed successfully');

        }else{
            Session()->flash('E_message','Password does not matched!');
        }

    }
    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
