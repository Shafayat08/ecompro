<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('catagory') }}">Category</a>
        </li>

        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">Log in</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 