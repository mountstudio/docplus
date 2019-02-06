<ul class="nav flex-column bg-white border">
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/options') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/options') ? 'text-light' : 'text-dark' }}" href="{{ route('options') }}">Настройки</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*doctor*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/doctor') ? 'text-light' : 'text-dark' }}" href="{{ route('doctor.index') }}">Доктора</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*clinic*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/clinic') ? 'text-light' : 'text-dark' }}" href="{{ route('clinic.index') }}">Клиника</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*service*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/service') ? 'text-light' : 'text-dark' }}" href="{{ route('service.index') }}">Сервис</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*category*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('admin/category') ? 'text-light' : 'text-dark' }}" href="{{ route('category.index') }}">Категории</a>
    </li>
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