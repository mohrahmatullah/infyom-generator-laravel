<li class="{{ Request::is('glasses*') ? 'active' : '' }}">
    <a href="{!! route('glasses.index') !!}"><i class="fa fa-edit"></i><span>Glasses</span></a>
</li>

<li class="{{ Request::is('abouts*') ? 'active' : '' }}">
    <a href="{!! route('abouts.index') !!}"><i class="fa fa-edit"></i><span>Abouts</span></a>
</li>

