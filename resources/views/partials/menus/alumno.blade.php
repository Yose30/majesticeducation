<li class="nav-item">
    <a 
        class="nav-link" 
        href="{{ route('alumno.inicio') }}" >
        <i class="fa fa-book" id="logeo"> {{ __("Mis clases") }}</i>
    </a>
</li>
<li class="nav-item">
    <a 
        class="nav-link" 
        data-toggle="modal" 
        data-target="#unirClase"
        href="#" >
        <i class="fa fa-plus" id="logeo"> {{ __("Unir a clase") }}</i>
    </a>
</li>

@include('partials.menus.logout')