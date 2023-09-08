@extends('layouts.app')
@section("titulo")
    Menús
@endsection
@section('content')
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Editar {{$titulo}}</strong>

                              <div class="card-header-actions">

                              </div>
                          </div>
                          <div class="card-body">
                          </div>
                          <div class="card-body">
                          <div class="row">
                                    <div class="col-lg-2 col-md-3"></div>
                                    <div class=" border col-lg-8 col-md-12 col-sm-12 col-xs-12 p-3">
                              {!! Form::model($menu, ['route' => ['menus.update', $menu->id], 'method' => 'patch']) !!}

                              @include('publico.menus.fields')

                              {!! Form::close() !!}
                              </div>
                                    <div class=" col-lg-2 col-md-3"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection
