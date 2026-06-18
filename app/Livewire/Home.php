<?php

namespace App\Livewire;

use App\Models\Counter;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Home extends Component
{

    public $name = null;
    public $xname = null;
    public $count = 0;
    public $xcount = 1;
    public $mode = "plus";
    public $id;

    public function render()
    {
        return view('livewire.home');
    }

    public function increase($id, $count = 1)
    {
        $counter = Counter::where('user_id', auth()->user()->id)->find($id);
        if (!$counter) {
            return;
        }
        $counter->value += $count;
        $counter->save();
    }

    public function decrease($id, $count = 1)
    {
        $counter = Counter::where('user_id', auth()->user()->id)->find($id);
        if (!$counter) {
            return;
        }

        $counter->value = $counter->value - $count;
        if ($counter->value < 0) {
            $counter->value = 0;
        }
        $counter->save();
    }

    public function change_mode($id, $to = "plus")
    {
        $this->mode = $to;
        $this->id = $id;

        $counter = Counter::where('user_id', auth()->user()->id)->find($id);

        $this->xname = $counter->name;

        $this->js("$('.modal').modal('show')");
    }

    public function run()
    {
        $xcount = (int) $this->xcount;
        if ($this->mode == 'plus') {
            $this->increase($this->id, $xcount);
        } else {
            $this->decrease($this->id, $xcount);
        }


        $this->js("$('.modal').modal('hide')");
        $this->reset(['xcount']);
    }








    #[Computed()]
    public function counters()
    {
        return Counter::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function save()
    {
        Counter::create([
            'name' => $this->name,
            'value' => $this->count,
            'user_id' => auth()->user()->id
        ]);
    }

    public function delete($id)
    {
        Counter::where('id', $id)->delete();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('.');
    }
}
