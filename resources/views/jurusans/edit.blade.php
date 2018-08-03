@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jurusan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jurusan, ['route' => ['jurusans.update', $jurusan->id], 'method' => 'patch']) !!}

                        @include('jurusans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection