<div>
    @if ($type == 1)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Editar perfíl') }}</div>

                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{ __('Nombre') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        wire:model="data.name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('data.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{ __('Correo') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        wire:model="data.email" value="{{ old('email') }}" autocomplete="email">

                                    @error('data.email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            

                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="button" wire:click='store()' class="btn btn-primary col-12">
                                            {{ __('Guardar') }}
                                        </button>


                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Cambiar contraseña') }}</div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label">{{ __('Nueva contraseña') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" wire:model="password" required
                                        autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="button" wire:click='setPassword()' class="btn btn-primary col-12">
                                            {{ __('Guardar') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
