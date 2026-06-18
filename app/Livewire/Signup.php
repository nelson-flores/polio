<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth',['title'=>'Criar conta'])]
class Signup extends Component
{
    public function render()
    {
        return view('livewire.signup');
    }


    public $name = null;
    public $password = null;

    public function submit()
    {
        try {
            $user = User::create([
                'name'=>$this->name,
                'password'=>bcrypt($this->password),
                'username'=>$this->generate_username($this->name)
            ]);

            Auth::loginUsingId($user->id);

            return session()->flash('message','Seu nome de usuario: '.$user->username);#redirect()->route('app');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
    }




/**
 * Generate a username from a full name
 *
 * @param  string  $fullname  - The full name to generate the username from
 * @return string - The generated username
 *
 * @author Nelson Flores <nelson.flores@live.com>
 */
function generate_username($fullname)
{

    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $fullname);

    $toLower = strtolower($clean);

    $split = explode(' ', trim($toLower));

    $first = $split[0];

    if (count($split) > 1) {
        $last = end($split);
    } else {
        $last = '';
    }

    $username = $first.'.'.$last;

    $counter = '';

    $user = User::where('username', $username)->first();

    while (! empty($user->id)) {
        $counter = empty($counter) ? 1 : ($counter + 1);
        $user = User::where('username', $username.$counter)->first();
    }

    $username = trim($username.$counter, '.');

    return strtolower($username);
}

}
