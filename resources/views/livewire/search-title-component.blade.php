@inject('title_rating', 'App\Models\TitleRating')
<div>
   
   
   <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <div class="input-group">
                <input type="text" class="form-control" wire:model='searchTitle'>
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="fa fa-search search-home"></i>
                    </button>
        
                </div>
        
            </div>
        </div>
   </div>

   <div class="row justify-content-center mt-3">
        <div class="col-10 text-center">
            <a href="/titulo/crear" class="btn btn-outline-primary col-12 col-md-4"><i class="fas fa-tag"></i> Comprar título</a>
        </div>
    </div>
    
    {{-- titulos --}}

    <div class="row justify-content-center">
        <div class="col-12   col-md-10">
            <div class="list-title">
                <div class="row mt-5">
                    <div class="col-6 col-md-4 offset-0 offset-md-1"><span class="font-weight-bold text-muted">Palabras Clave</span></div>
                    <div class="col-1 col-md-1 offset-1 offset-md-3"> Calificación </div>
                    {{-- <div class="col-1 col-md-2 offset-1 offset-md-0 text-md-center"> <a><i class="fas fa-eye-slash text-muted eye-show"></i></a> </div> --}}
                </div>
                <div class="row">
                    <div class="col-12 mt-n2"><hr></div>
                </div>
                @foreach ($titles as $title)
                    <div>
        
                        <div class="row mt-5 listado py-3">
        
                            <div class="col-3 col-md-2 offset-md-1" >
                                @if ($title->imagen != '')
                                    <a  href="/titulo/{{ $title->slug }}">
                                        <img src="{{  asset('img/title/' . $title->imagen) }}"  alt="Profiler" class="rounded-circle shadow img-fluid thumb">
                                    </a>
                                @endif
        
                            </div>
                            @if (Auth::id() == $title->user_id)
                                <div class="col-4 col-md-5 align-self-center">
                                    <a href="/titulo/{{ $title->slug }}">
                                        <span>{{ $title->titulo }}</span>
                                    </a>
                                </div>
                                @else
                                <div class="col-4 col-md-4 offset-1  align-self-center">
                                    <a href="/titulo/{{ $title->slug }}">
                                        <span>{{ $title->titulo }}</span>
                                    </a>
                                </div>
                            @endif
                            <div class="col-1 col-md-3 align-self-center">
                                <?php $stars = $title_rating->getRateByTitle($title->id); ?>
                                <small>
                                    <ul class="list-inline">
                                        @if ($stars > 0)
                                            @for ($i = 0; $i < $stars; $i++)
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                            @endfor
                                        @else
                                            <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                        @endif
                                        
                                    </ul>
                                </small>
                            </div>
                            {{-- <div class="col-3 col-md-3 align-self-center">
                                
                                
                                <button  type="button"  class="btn btn-outline-primary btn-rounded ml-2 btn-rounded  shadow px-2 py-0 py-md-1 px-md-3">Dar <i class="fas fa-heart heart-small text-danger"></i> </button>
                                @if (Auth::id() == $title->user_id)
                                    <a  href="/titulo/{{ $title->id }}/edit" class="btn btn-outline-primary btn-rounded ml-2 btn-rounded  shadow px-2 py-0 py-md-1 px-md-3"> <i class="fas fa-edit"></i> </a>
                                @endif
                            </div> --}}
                            <div class="w-100 d-block d-md-none"></div>
        
                        </div>
                    </div>
                @endforeach
                
            </div>
    
        </div>
        <div class="col-12 text-center">
            {{ $titles->links() }}
        </div>
       
    </div>
    
    {{-- titulos --}}

    <!--  modal corazónes -->
    <div class="modal fade" id="corazonesModal" tabindex="-1" role="dialog" aria-labelledby="corazonesModalLabel"
    aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content modal-content-corazones">
           <div class="modal-header">
               <h5 class="modal-title" id="corazonesModalLabel">Tarjetas Virtuales Indexadas</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <div class="">
                   <form>
                       <div class="form-row">
                           <span class="small text-muted add-heart-legend">Tienes <span id="mi_corazones">  </span> para regalar</span>
                       </div>
                       <div class="form-row">
                           <div class="col">
                               <input type="number" id="icorazones"  class="form-control mt-1" placeholder="">
                               <input type="hidden" id="title_id" value="0">

                           </div>

                           <div class="col-2 align-self-center">
                               <a  class="pointer"><i class="fas fa-heart fa-2x add-heart-i text-danger ml-1"></i></a>
                           </div>
                           <div class="col-12">
                               <small class="text-danger registro-corazones icorazones"></small>
                           </div>
                       </div>
                       
                   </form>
               </div>
           </div>

       </div>
   </div>
</div>
<!--  /modal corazónes -->
    
</div>