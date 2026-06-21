<?php

namespace App\Livewire;

use App\Models\Counter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $name = null;
    public $xname = null;
    public $count = 0;
    public $xcount = 1;
    public $tag = '';
    public $mode = "plus";
    public $id = null;
    public $edit_id = null;

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

        $this->js("$('#aumentar').modal('show')");
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




    public $totals = null;

    public function see_totals()
    {
        $this->totals = $dados = Counter::select('tag', DB::raw('SUM(value) as total'))
            ->groupBy('tag')
            ->get();


        $this->js("$('#total').modal('show')");
    }




    #[Computed()]
    public function counters()
    {
        return Counter::where('user_id', auth()->user()->id)->latest()->paginate(8);
    }

    public function edit($id)
    {
        $counter = Counter::find($id);
        $this->edit_id = $counter->id;
        $this->name = $counter->name;
        $this->tag = $counter->tag;
        $this->count = $counter->value;
        $this->js('$("#modal_edit").modal("show")');

    }

    public function save()
    {
        if ($this->edit_id) {
            $counter = Counter::find($this->edit_id);
            $counter->name = $this->name;
            $counter->value = $this->count;
            $counter->tag = $this->tag;
            $counter->save();
        } else {
            Counter::create([
                'name' => $this->name,
                'value' => $this->count,
                'tag' => $this->tag,
                'user_id' => auth()->user()->id
            ]);
        }
        $this->reset(['id','edit_id', 'name', 'count', 'tag']);

        $this->js("$('.modal').modal('hide')");
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
