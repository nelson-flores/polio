<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth',['title'=>'Login'])]
class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }




    public $user;
    public $password;
    public $remember = false;


    public function submit()
    {
        try {

            $r = Auth::attempt([
                'username' => $this->user,
                'password' => $this->password
            ], $this->remember == true);

            if ($r == false) {
                throw new Exception("Erro de autenticacao");
            }

            return redirect()->route('app');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }
}
