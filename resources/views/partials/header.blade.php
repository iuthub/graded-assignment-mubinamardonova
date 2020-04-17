<div class="menu-header">
    <a href="{{ route('mainIndex') }}" class="logo">To do List App</a>
    <div class="menu-bar">
        @if(!Auth::check())
			<div class="menu-item"><a href="{{ url('/login') }}">Login</a></div>
			<div class="menu-item"><a href="{{ url('/register') }}">Sign Up</a></div>
		@else
			<div class="menu-item"><a href="{{ route('adminIndex') }}">Tasks</a></div>
			<div class="menu-item"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
					<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
					</form>
			</div>
		@endif 
    </div>
</div>
