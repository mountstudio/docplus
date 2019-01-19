<ul class="nav flex-column bg-white border">
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/options') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/options') ? 'text-light' : 'text-dark' }}" href="{{ route('options') }}">Настройки</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/doctor') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/doctor') ? 'text-light' : 'text-dark' }}" href="{{ route('doctor.index') }}">Доктора</a>
    </li>
    {{--<li class="nav-item py-1 border-bottom {{ Request::is('admin/property') ? 'bg-secondary' : '' }}">--}}
        {{--<a class="nav-link {{ Request::is('admin/property') ? 'text-light' : 'text-dark' }}" href="{{ route('property.index') }}">Свойства</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item py-1 border-bottom {{ Request::is('admin/product') ? 'bg-secondary' : '' }}">--}}
        {{--<a class="nav-link {{ Request::is('admin/product') ? 'text-light' : 'text-dark' }}" href="{{ route('product.index') }}">Продукты</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item py-1 border-bottom {{ Request::is('admin/stock') ? 'bg-secondary' : '' }}">--}}
        {{--<a class="nav-link {{ Request::is('admin/stock') ? 'text-light' : 'text-dark' }}" href="{{ route('stock.index') }}">Акции</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item py-1 border-bottom {{ Request::is('admin/basket') ? 'bg-secondary' : '' }}">--}}
        {{--<a class="nav-link {{ Request::is('admin/basket') ? 'text-light' : 'text-dark' }}" href="{{ route('basket.index') }}">Заказы</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item py-1 border-bottom {{ Request::is('admin/user') ? 'bg-secondary' : '' }}">--}}
        {{--<a class="nav-link {{ Request::is('admin/user') ? 'text-light' : 'text-dark' }}" href="{{ route('user.index') }}">Пользователи</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item py-1 border-bottom {{ Request::is('admin/bid') ? 'bg-secondary' : '' }}">--}}
        {{--<a class="nav-link {{ Request::is('admin/bid') ? 'text-light' : 'text-dark' }}" href="{{ route('bid.index') }}">Вопросы</a>--}}
    {{--</li>--}}
</ul>