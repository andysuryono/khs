@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dosen
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dosen, ['route' => ['dosens.update', $dosen->id], 'method' => 'patch']) !!}

                        @include('dosens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection