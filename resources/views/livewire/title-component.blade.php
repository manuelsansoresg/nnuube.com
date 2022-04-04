<div>
    <form action="" wire:submit.prevent="store()" enctype="multipart/form-data">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">

                    <div class="card">
                        <div class="card-body py-5">
                            <div class="py-3 ms-4">
                                <h5 class="card-title text-muted"> 100 MXN TARJETA VIRTUAL INDEXADA A GOOGLE</h5>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-11">
                                    <div class="card">
                                        <div class="card-body">

                                            <p class="text-muted text-center h5 py-3">FORMATO UNIVERSAL DE RESULTADO EN
                                                BUSCADORES
                                            </p>
                                            <hr>
                                            <div class="form-group row mt-5">
                                                <label for="titulo"
                                                    class="col-sm-4 col-form-label">https://nnuube.com>titulo></label>
                                                <div class="col-sm-8">
                                                    <input type="text" placeholder="Palabras clave aquí"
                                                        class="form-control" wire:model="data.titulo" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="" id="" cols="30" rows="5" wire:model="data.descripcion" class="form-control mt-3"
                                                    placeholder="Realiza una breve descripción de tus palabras clave para que la gente ingrese un mínimo de 80 palabras máximo 100 palabras" required></textarea>
                                            </div>
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control"
                                                    wire:model="data.palabras_clave"
                                                    placeholder="Ej: palabras, clave separadas, por , una , coma" required>
                                                <small> Palabras clave separadas por ,</small>
                                            </div>

                                            <div class="input-group mt-3">
                                                <div class="input-group-append">
                                                    <span class="btn bg-primary text-white">
                                                        <i class="fas fa-globe"></i> https://
                                                    </span>

                                                </div>
                                                <input type="text" class="form-control" wire:model="data.sitio">
                                            </div>

                                            <div class="input-group mt-3">
                                                <div class="input-group-append">
                                                    <span class="btn bg-primary text-white">
                                                        <i class="fab fa-facebook"></i> https://facebook.com/
                                                    </span>

                                                </div>
                                                <input type="text" class="form-control" wire:model="data.facebook">
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-append">
                                                    <span class="btn bg-primary text-white">
                                                        <i class="fab fa-twitter"> </i> https://twitter.com/
                                                    </span>

                                                </div>
                                                <input type="text" class="form-control" wire:model="data.twitter">
                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-append">
                                                    <span class="btn bg-primary text-white">
                                                        <i class="fab fa-instagram"></i> https://instagram.com/
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" wire:model="data.instagram">
                                            </div>
                                            
                                            <div class="form-group mt-3">
                                                <label class="text-muted">Agregar una imagen</label>
                                                <input type="file" onchange="valImage(this);" wire:model="file" name="imagen" id="imagen"
                                                    class="form-control" required>
                                                <small class="form-text text-muted">Esta imagen saldra al compartir en
                                                    tus
                                                    redes
                                                    sociales</small>
                                            
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-5">
                                <div class="col-12 col-md-11">
                                    <div class="card pt-3 pb-5">
                                        <div class="card-body">
                                            <h5 class="card-title text-muted text-center mt-2"> VISTA PREVIA DE TU
                                                TARJETA
                                                INDEXADA </h5>

                                        </div>

                                        <div class="container">
                                            <div class="row mt-n3">
                                                <div class="col-12">
                                                    <hr class="px-5">
                                                    <div class="card shadow-lg mt-5">
                                                        <div class="card-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-5 py-5">
                                                                        @if ($data['imagen'] == '')
                                                                            <img class="img-fluid" id="preview"
                                                                            wire:ignore
                                                                            src="{{ asset('img/upload.png') }}"
                                                                            alt="">
                                                                        @else
                                                                            <img class="img-fluid" id="preview"
                                                                            
                                                                            wire:ignore
                                                                            src="{{  asset('storage/' . $data['imagen']) }}"
                                                                            alt="">
                                                                        @endif
                                                                       

                                                                    </div>
                                                                    <div class="col-7 align-self-center">
                                                                        <p>
                                                                            <span
                                                                                class="text-muted">{{ $data['titulo'] != '' ? $data['titulo'] : 'titulo' }}</span>
                                                                            <span>{{ $data['palabras_clave'] != '' ? '(' . $data['palabras_clave'] . ')' : '(PALABRAS CLAVE)' }}</span>
                                                                        </p>
                                                                        <p>
                                                                            @if ($data['descripcion'] == '')
                                                                                breve descripción de tus palabras clave
                                                                                para
                                                                                que la gente ingrese un mínimo de 80
                                                                                palabras máximo 100 palabras
                                                                            @else
                                                                                {{ $data['descripcion'] }}
                                                                            @endif

                                                                        </p>
                                                                        <hr>


                                                                        <ul class="list-inline text-center">
                                                                            @if ($data['sitio'] != '')
                                                                                <li class="list-inline-item fa-2x px-2">
                                                                                    <a href="https://{{ $data['sitio'] }}"
                                                                                        target="_blank"> <i
                                                                                            class="fas fa-globe"></i>
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                            @if ($data['facebook'] != '')
                                                                                <li class="list-inline-item fa-2x px-2">
                                                                                    <a href="https://www.facebook.com/{{ $data['facebook'] }}"
                                                                                        target="_blank"> <i
                                                                                            class="fab fa-facebook"></i>
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                            @if ($data['twitter'] != '')
                                                                                <li class="list-inline-item fa-2x px-2">
                                                                                    <a href="https://twitter.com/{{ $data['twitter'] }}"
                                                                                        target="_blank"> <i
                                                                                            class="fab fa-twitter"> </i>
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                            @if ($data['instagram'] != '')
                                                                                <li class="list-inline-item fa-2x px-2">
                                                                                    <a href="https://www.instagram.com/{{ $data['instagram'] }}"
                                                                                        target="_blank"> <i
                                                                                            class="fab fa-instagram"></i>
                                                                                    </a>
                                                                                </li>
                                                                            @endif



                                                                        </ul>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-5">
                                <div class="col-12 col-md-11">
                                    <div class="card py-4">
                                        <div class="card-body">
                                            <h5 class="card-title text-muted text-center py-3">¿ QUE ESTOY COMPRANDO?
                                            </h5>
                                            <hr class="px-5">
                                            <div class="mt-5">
                                                <p class="h5 text-center"> <span class="fw-bold">T</span>arjeta
                                                    <span class="fw-bold">T</span>irtual <span
                                                        class="fw-bold">T</span>ndexada <span
                                                        class="h6">TVI</span> <span class="fw-bold">a
                                                        Google</span> </p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold">¿Qué se
                                                        puede
                                                        posicionar en google?</span> Palabras Clave </p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold">¿De
                                                        que?</span>
                                                    Personas, Marcas, Establecimientos, Productos, Servicios, TODO. </p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold">Cómo
                                                        alcanzar
                                                        el 1er Listado de Resultados en Google?</span></p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold"> - Comprar
                                                        mas
                                                        de una TVI: </span></p>
                                                <p class="h5 text-center mt-3"> <span class=""> mismas o
                                                        diferentes Palabras Clave, diferente acomodo </span></p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold"> - Palabras
                                                        Clave Originales </span></p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold"> -
                                                        Información
                                                        real </span></p>
                                                <p class="h5 text-center mt-3"> <span class="fw-bold"> -
                                                        Solicitar
                                                        comentarios y reseñas </span></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-12 text-center">
                                    <div wire:loading wire:target="store">
                                        <div class="fa-3x">
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="text-center mt-5"> 100 MXN TARJETA VIRTUAL INDEXADA A GOOGLE </p>
                                    @if ($title_id == null)
                                        <button type="submit" class="btn btn-outline-primary col-5">COMPRAR</button>
                                        @else
                                        <button type="submit" class="btn btn-outline-primary col-5">EDITAR</button>
                                    @endif
                                   

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
