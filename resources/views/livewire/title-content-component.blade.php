<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-10">
                <h3 class="text-center text-muted">TARJETA VIRTUAL INDEXADA A GOOGLE </h3>
                <hr>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-10 col-md-10">
                <div class="card shadow">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-md-6 align-self-center">
                                <img src="{{ asset('img/title/' . $title->imagen) }}" alt="Profiler"
                                    class="img-fluid">
                            </div>
                            <div class="col-12 col-md-6">
                                <h1 class="h2 text-center"> {{ $title->titulo }} </h1>
                                <h2 class="text-muted description mt-3"> {{ $title->descripcion }} </h1>

                                    <ul class="list-inline text-center mt-3">
                                        @if ($title->sitio != '')
                                            <li class="list-inline-item"> <a href="https://{{ $title->sitio }}"
                                                    target="_blank"> <i class="fas fa-globe fa-2x"></i></a> </li>
                                        @endif
                                        @if ($title->facebook != '')
                                            <li class="list-inline-item"> <a href="https://{{ $title->facebook }}"
                                                    target="_blank"> <i class="fab fa-facebook fa-2x"></i></a> </li>
                                        @endif
                                        @if ($title->twitter != '')
                                            <li class="list-inline-item"> <a href="https://{{ $title->twitter }}"
                                                    target="_blank"> <i class="fab fa-twitter fa-2x"></i></a> </li>
                                        @endif
                                        @if ($title->instagram != '')
                                            <li class="list-inline-item"> <a href="https://{{ $title->instagram }}"
                                                    target="_blank"> <i class="fab fa-instagram fa-2x"></i></a> </li>
                                        @endif
                                    </ul>
                                    <p>
                                    <div id="rateTitle" wire:ignore></div> Calificación
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-12 text-center" id="rate">
                <div id="rateYo" wire:ignore></div>
            </div>
        </div>
        {{-- <form wire:submit.prevent="storeComment()"> --}}
            <form action="" wire:submit.prevent="storeComment()">
                <div class="row justify-content-center mt-5">
                   
                    <div class="col-12 col-md-10">
                        <p class="text-center text-muted"> COMENTARIOS </p>
                        <input type="hidden" id="title_id" value="{{ $title->id }}">
                        <input type="hidden" id="rateMyTitle" value="{{ $rate }}">
                        <hr>
                    </div>
                    <div class="col-12"></div>
                    <div class="col-12 col-md-10">
                        <div class="mb-3">
                            <textarea wire:model="comment" id="" cols="30" rows="4" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-12"></div>
    
                    <div class="col-12 col-md-10 text-end">
                        <button type="submit" class="btn btn-outline-primary col-md-3">Comentar</button>
                    </div>
        
                </div>
            </form>
        {{-- </form> --}}

        <div class="row justify-content-center mt-5">
            <div class="col-10 col-md-10">
                <table>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    <p class="mt-2">
                                        COMENTARIO: {{ $comment->comment }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-12 text-center">
            {{ $comments->links() }}
        </div>

    </div>
</div>
