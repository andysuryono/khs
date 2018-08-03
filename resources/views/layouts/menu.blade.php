<li class="{{ Request::is('jurusans*') ? 'active' : '' }}">
    <a href="{!! route('jurusans.index') !!}"><i class="fa fa-edit"></i><span>Jurusans</span></a>
</li>

<li class="{{ Request::is('dosens*') ? 'active' : '' }}">
    <a href="{!! route('dosens.index') !!}"><i class="fa fa-edit"></i><span>Dosens</span></a>
</li>

<li class="{{ Request::is('mataKuliahs*') ? 'active' : '' }}">
    <a href="{!! route('mataKuliahs.index') !!}"><i class="fa fa-edit"></i><span>MataKuliahs</span></a>
</li>

<li class="{{ Request::is('mahasiswas*') ? 'active' : '' }}">
    <a href="{!! route('mahasiswas.index') !!}"><i class="fa fa-edit"></i><span>Mahasiswas</span></a>
</li>

<li class="{{ Request::is('semesters*') ? 'active' : '' }}">
    <a href="{!! route('semesters.index') !!}"><i class="fa fa-edit"></i><span>Semesters</span></a>
</li>

<li class="{{ Request::is('studies*') ? 'active' : '' }}">
    <a href="{!! route('studies.index') !!}"><i class="fa fa-edit"></i><span>Studies</span></a>
</li>

<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{!! route('admins.index') !!}"><i class="fa fa-edit"></i><span>Admins</span></a>
</li>

