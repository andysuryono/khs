<li class="{{ Request::is('jurusans*') ? 'active' : '' }}">
    <a href="{!! route('jurusans.index') !!}"><i"></i><span>Jurusan</span></a>
</li>

<li class="{{ Request::is('dosens*') ? 'active' : '' }}">
    <a href="{!! route('dosens.index') !!}"><i></i><span>Dosen</span></a>
</li>

<li class="{{ Request::is('mataKuliahs*') ? 'active' : '' }}">
    <a href="{!! route('mataKuliahs.index') !!}"><i></i><span>Mata Kuliah</span></a>
</li>

<li class="{{ Request::is('mahasiswas*') ? 'active' : '' }}">
    <a href="{!! route('mahasiswas.index') !!}"><i></i><span>Mahasiswa</span></a>
</li>

<li class="{{ Request::is('semesters*') ? 'active' : '' }}">
    <a href="{!! route('semesters.index') !!}"><i></i><span>Semester</span></a>
</li>

{{-- <li class="{{ Request::is('studies*') ? 'active' : '' }}">
    <a href="{!! route('studies.index') !!}"><i class="fa fa-edit"></i><span>Studies</span></a>
</li>

<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{!! route('admins.index') !!}"><i class="fa fa-edit"></i><span>Admins</span></a>
</li> --}}

