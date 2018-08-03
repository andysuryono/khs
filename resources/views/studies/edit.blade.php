@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Study
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($study, ['route' => ['studies.update', $study->id], 'method' => 'patch']) !!}

                        @include('studies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection