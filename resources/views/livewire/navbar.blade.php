<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}" wire:navigate>Livewire</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home')}}" wire:navigate>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.index')}}" wire:navigate>Students</a>
          </li>
          @if ($isAdmin)
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}" wire:navigate>Users</a>
          </li>
          @endif
        @guest
            <li class="d-lg-none nav-item">
              <a class="nav-link" href="{{route('login')}}" wire:navigate>Login</a>
            </li>
            <li class="d-lg-none nav-item">
              <a class="nav-link" href="{{route('register')}}" wire:navigate>Register</a>
            </li>
        @endguest
        @auth
        <li class="d-lg-none nav-item">
          <a wire:click='logout' class="nav-link">Logout</a>
        </li>
        @endauth
        </ul>
    </div>
    @guest
    <div class="d-none d-lg-flex gap-3">
      <a href="{{route('login')}}" wire:navigate class="text-white">Login</a>
      <a href="{{route('register')}}" wire:navigate class="text-white">Register</a>
    </div>
    @endguest
    @auth
    <div class="d-none d-lg-flex gap-3">
      <a wire:click='logout' class="text-white">Logout</a>
    </div>
    @endauth
    </div>
  </nav>

