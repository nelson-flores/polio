<div>


    <h6 class="text-center mb-4 mt-2 text-uppercase">Criar conta</h6>
    @if (session()->has('error'))
        <div class="alert alert-danger mb-3 rounded-0">
            <p>{{ session()->get('error') }}</p>
        </div>
    @elseif(session()->has('message'))
        <div class="alert alert-info mb-3 rounded-0">
            <p>{{ session()->get('message') }}</p>
        </div>

    @endif

    <form method="POST" action="./" wire:submit.prevent='submit'>

    @if(!session()->has('message'))
        <!-- User -->
        <div class="mb-3">
            <label for="user" class="form-label">Nome completo</label>
            <input type="text" class="form-control rounded-0" id="user" name="user" placeholder="Digite seu nome"
                required wire:model='name'>
        </div>

        <!-- Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Nova Senha</label>
            <input type="text" class="form-control rounded-0" id="password" name="password"
                placeholder="Defina sua senha" required wire:model='password'>
        </div>

        <!-- Botão -->
        <div class="d-grid text-center">
            <button type="submit" class="btn btn-info rounded-0 text-uppercase" wire:loading.attr="disabled"
                wire:target="submit">

                <span wire:loading.remove wire:target="submit">
                    Criar conta
                </span>

                <span wire:loading wire:target="submit">
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Aguarde...
                </span>

            </button>
        </div>

        <!-- Links extras -->
        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Ja tenho conta</a>
        </div>

            
        @else
            
        <!-- Links extras -->
        <div class="text-center mt-3">
            <a href="{{ route('app') }}" class="btn btn-lg btn-info">Entrar</a>
        </div>
        @endif

    </form>
</div>