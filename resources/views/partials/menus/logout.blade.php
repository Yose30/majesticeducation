<li>
    <a href="{{ route('logout') }}" 
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
        style="margin-left: 30px;">
        <i class="fa fa-unlock" id="logeooff"> {{ __('Cerrar sesión') }}</i>
    </a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>