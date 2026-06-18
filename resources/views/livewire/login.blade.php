<div>


    <h6 class="text-center mb-4 mt-2 text-uppercase">Iniciar Sess&atilde;o</h6>
    @if (session()->has('error'))
        <div class="alert alert-danger mb-3 rounded-0">
            <p>{{ session()->get('error') }}</p>
        </div>
    @elseif(session()->has('message'))
        <div class="alert alert-info mb-3 rounded-0">
            <p>{{ session()->get('message') }}</p>
        </div>
        <script>setTimeout(()=>(){location.reload()},3000)</script>
    @endif

    <form method="POST" action="./" wire:submit.prevent='submit'>

        <!-- User -->
        <div class="mb-3">
            <label for="user" class="form-label">Usuario</label>
            <input type="text" class="form-control rounded-0" id="user" name="user" placeholder="Digite seu usuario"
                required wire:model='user'>
        </div>

        <!-- Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control rounded-0" id="password" name="password"
                placeholder="Digite sua senha" required wire:model='password'>
        </div>

        <!-- Lembrar -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" wire:model='remember'>
            <label class="form-check-label" for="remember">Lembrar-me</label>
        </div>

        <!-- Botão -->
        <div class="d-grid text-center">
            <button type="submit" class="btn btn-info rounded-0 text-uppercase" wire:loading.attr="disabled"
                wire:target="submit">

                <span wire:loading.remove wire:target="submit">
                    Entrar
                </span>

                <span wire:loading wire:target="submit">
                    <span class="spinner-border spinner-border-sm me-2"></span>
                    Aguarde...
                </span>

            </button>
        </div>

        <!-- Links extras -->
        <div class="text-center mt-3">
            <a href="{{ route('signup') }}">Criar conta</a>
        </div>

    </form>
</div>