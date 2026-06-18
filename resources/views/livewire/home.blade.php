<div>
    <div class="row">

        <div class="col-lg-8 col-xl-9 m-auto">
            <!-- Stats -->
            <div class="row">
                <div class="col-md-12">

                    <div class="block">
                        <div class="block-content bg-black-10">
                            <h3 class="font-size-sm text-muted font-weight-bold text-uppercase mb-0">Novo Contador
                            </h3>
                        </div>
                        <div class="block-content">
                            <form action="#" class="row" wire:submit.prevent='save'>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Nome</label>
                                    <input type="text" class="form-control" wire:model='name' />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Valor Inicial</label>
                                    <input type="text" class="form-control" wire:model='count' value="0" />
                                </div>
                                <div class="form-group col-12">
                                    <button type="submit" class="btn btn-info"><i
                                            class="fa fa-save mx-1"></i>Adicionar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!-- END Stats -->

            <!-- Projects -->
            <div class="block">
                <div class="block-content bg-black-10">
                    <h3 class="font-size-sm text-muted font-weight-bold text-uppercase mb-0">Meus Contadores</h3>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table  table-striped table-vcenter font-size-sm mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 40px;"></th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                    <th class="text-center">
                                        Accoes
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->counters as $counter)



                                <tr>
                                    <td class="text-center">

                                    </td>
                                    <td>
                                        <strong class='d-block'>{{$counter->name}}</strong>
                                        <small> {{$counter->created_at->format('d/m/Y H:i')}}</small>
                                    </td>
                                    <td>
                                        <h4>{{$counter->value}}</h4>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">

                                            <button type="button" class="btn btn-info" wire:loading.attr="disabled"
                                                wire:target="change_mode"
                                                wire:click="change_mode({{ $counter->id }},'plus')">

                                                <span wire:loading.remove wire:target="change_mode">
                                                    <i class="fa fa-plus"></i> Mais
                                                </span>

                                                <span wire:loading wire:target="change_mode">
                                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                                    Aguarde...
                                                </span>

                                            </button>
                                            <button type="button" class="btn btn-warning" wire:loading.attr="disabled"
                                                wire:target="change_mode"
                                                wire:click="change_mode({{ $counter->id }},'less')">

                                                <span wire:loading.remove wire:target="change_mode">
                                                    <i class="fa fa-minus"></i> Menos
                                                </span>

                                                <span wire:loading wire:target="change_mode">
                                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                                    Aguarde...
                                                </span>

                                            </button>

                                            <button class="btn btn-danger" wire:click="delete({{$counter->id}})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>




                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Projects -->
        </div>
    </div>










    <div class="modal" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ ($this->mode =='plus'?"Aumentar":"Reduzir").": ".$this->xname }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-label">Digite o valor</label>
                        <div class="input-group">

                            <button type="button" class="btn btn-lg rounded-0 btn-dark" onclick="less()"><i
                                    class="fa fa-minus"></i></button>

                            <input type="tel" class="form-control form-control-lg rounded-0 number" wire:model='xcount'
                                value="0" />

                            <button type="button" class="btn btn-lg rounded-0 btn-dark" onclick='plus()'><i
                                    class="fa fa-plus"></i></button>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info rounded-0 text-uppercase" wire:loading.attr="disabled"
                        wire:target="run" wire:click='run'>

                        <span wire:loading.remove wire:target="run">
                            Confirmar
                        </span>

                        <span wire:loading wire:target="run">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Aguarde...
                        </span>

                    </button>
                </div>
            </div>
        </div>
    </div>



    @section('scripts')

    <script>
        var number = $('.number');

function plus() {
    var value = parseInt(number.val());

    if (isNaN(value)) {
        value = 0;
    }

    number.val(value + 1);
    Livewire.first().set('xcount', (value + 1));
}

function less() {
    var value = parseInt(number.val());

    if (isNaN(value)) {
        value = 0;
    }
    value = value - 1;
    if (value<0) {
        value= 0;
    }

    number.val(value);
    Livewire.first().set('xcount', (value));
}

    </script>


    @endsection
    s



</div>