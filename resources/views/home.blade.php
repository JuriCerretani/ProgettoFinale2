@extends('layouts.app')

@section('content')

<div class="wrapper">
<div class="hero">
  <div class="navbar__content">
    <ul class="nav">
        <li><a class="link active" href="/">Home</a></li>
        <li><a class="link" href="wallet">Wallet</a></li>
    </ul>
    <div class="nav-btn">
      @guest
          @if (Route::has('login'))
              <button type="button" name="button" class="btn"><a href="login">Login</a></button>
          @endif

          @if (Route::has('register'))
              <button type="button" name="button" class="btn"><a href="register">Sign Up</a></button>
          @endif
      @else
      <div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" name="button" class="btn">Logout</button>
        </form>
      </div>
      @endguest

    </div>
  </div>
</div>

<!-- Crypto list -->
<div class="home">
  <div class="container">
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Rank</div>
        <div class="col col-2">Name</div>
        <div class="col col-3">Symbol</div>
        <div class="col col-4">Price (USD)</div>
      </li>

      @foreach ($data as $arr)
          <li class="table-row">
            <div class="col col-1"> {{ $arr->cmc_rank }} </div>
            <div class="col col-2"> {{ $arr->name }} </div>
            <div class="col col-3"> {{ $arr->symbol }} </div>
            <div class="col col-4"> {{ round($arr->quote->USD->price, 6) }} </div>
          </li>
      @endforeach

    </ul>
  </div>
</div>

</div>

@endsection
