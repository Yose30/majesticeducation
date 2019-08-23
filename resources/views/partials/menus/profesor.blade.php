<li class="nav-item">
    <a 
        class="nav-link" 
        href="{{ route('profesor.inicio') }}" >
        <i class="fa fa-book" id="logeo"> {{ __("Mis clases") }}</i>
    </a>
</li>
<li class="nav-item">
    <a 
        class="nav-link" 
        data-toggle="modal" 
        data-target="#nuevaMateria"
        href="#" >
        <i class="fa fa-plus" id="logeo"> {{ __("Crear clase") }}</i>
    </a>
</li>
<li class="nav-item">
    <a 
        class="nav-link" 
        href="{{ route('profesor.evaluaciones') }}" >
        <i class="fa fa-thumb-tack" id="logeo"> {{ __("Evaluaciones") }}</i>
    </a>
</li>
<li class="nav-item">
    <a 
        class="nav-link" 
        href="{{ route('profesor.recursos') }}" >
        <i class="fa fa-file-archive-o" id="logeo"> {{ __("Recursos") }}</i>
    </a>
</li>

@include('partials.clase.modal_nueva_clase')
@include('partials.menus.logout')
