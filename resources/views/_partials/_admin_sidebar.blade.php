<ul class="nav flex-column bg-white border">
    <li class="nav-item py-1 border-bottom {{ Request::is('admin/options') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('*options*') ? 'text-light' : 'text-dark' }}" href="{{ route('options') }}">Настройки</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*doctor*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('*doctor*') ? 'text-light' : 'text-dark' }}" href="{{ route('doctor.admin') }}">Доктора</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*clinic*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('*clinic*') ? 'text-light' : 'text-dark' }}" href="{{ route('clinic.index') }}">Клиника</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*category*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('*category*') ? 'text-light' : 'text-dark' }}" href="{{ route('category.index') }}">Категории</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*service*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('*service*') ? 'text-light' : 'text-dark' }}" href="{{ route('service.index') }}">Сервис</a>
    </li>
    <li class="nav-item py-1 border-bottom {{ Request::is('*spec*') ? 'bg-secondary' : '' }}">
        <a class="nav-link {{ Request::is('*spec*') ? 'text-light' : 'text-dark' }}" href="{{ route('spec.index') }}">Специализации</a>
    </li>
</ul>