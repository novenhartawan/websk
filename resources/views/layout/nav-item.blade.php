<li class="nav-item">
        <a href="{{ url($menu['url']) }}" 
        class="nav-link {{ request()->is($menu['url'] . '*') ? 'active' : '' }}">{{ $menu['name'] }}</a>
</li>
