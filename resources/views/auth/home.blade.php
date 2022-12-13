<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                You're logged in!
                <nav>
                    <a href="{{ route('oeuvre.index') }}">Les Oeuvres</a>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </nav>
            </div>
        </div>
    </div>
</div>
