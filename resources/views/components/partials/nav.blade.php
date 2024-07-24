<nav class="flex justify-between items-center mb-4">
    <a href="{{ url('/') }}">
        <img class="w-24" src="{{ asset('images/logo.png') }}" alt="LaraGigs Logo" class="logo" />
    </a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth

            <li>
                <span class="font-bold uppercase">Welcome {{ auth()->user()->name }}</span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel">
                    <i class="fa-solid fa-gear"></i> Manage Listings
                </a>
            </li>
            <li>
                <form action="/logout" method="POST">
                    @csrf
                <button type="submit">
                    <i class="fa-solid fa-door-closed"></i>
                    Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ url('/register') }}" class="hover:text-laravel">
                    <i class="fa-solid fa-user-plus"></i> Register
                </a>
            </li>
            <li>
                <a href="{{ url('/login') }}" class="hover:text-laravel">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            </li>
        @endauth
    </ul>
</nav>
