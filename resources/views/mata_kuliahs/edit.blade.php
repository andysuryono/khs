@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mata Kuliah
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mataKuliah, ['route' => ['mataKuliahs.update', $mataKuliah->id], 'method' => 'patch']) !!}

                        @include('mata_kuliahs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection