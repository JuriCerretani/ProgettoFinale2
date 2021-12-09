@extends('layouts.app')

@section('content')
<div class="wrapper">
<div class="hero">
  <div class="navbar__content">
    <ul class="nav">
        <li><a class="link" href="/">Home</a></li>
        <li><a class="link active" href="wallet">Wallet</a></li>
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

<!-- Form sinistra -->
<div class="form-box">
  <div class="tooltip">i <span class="tooltiptext">Add an asset and follow your investments</span></div>
  <form method="post" action="/wallet" class="form-asset">
    @csrf
    <label for="name">Cryptocurrency Name</label>
    <input class="input" list="criptovaluta" name="name" required>
    <datalist id="criptovaluta">
      @foreach($data as $coin)
      <option>{{ $coin->name }}</option>
      @endforeach
    </datalist>
    <label for="usd">USD invested</label>
    <input class="input" id="usd" name="usd" required />
    <label for="price">Cryptocurrency Price</label>
    <input class="input" id="price" name="price" required />
    <input class="btn" type="submit" name="submit" value="Aggiungi Criptovaluta" />
  </form>
</div>

<!-- Form destra -->
<div class="form-box form-box-2">
  <div class="tooltip">i <span class="tooltiptext">Add USD invested and how many tokens you earn</span></div>
  <form method="post" action="" class="form-asset">
    @csrf
    <label for="name" required>Cryptocurrency Name</label>
    <input class="input" list="criptovaluta" name="name" required>
    <datalist id="criptovaluta">
      @foreach($data as $coin)
      <option>{{ $coin->name }}</option>
      @endforeach
    </datalist>
    <label for="usd">USD invested</label>
    <input class="input" id="usd" name="usd" required />
    <label for="value">Tokens value</label>
    <input class="input" id="value" name="value" required />
    <input class="btn" type="submit" name="submit" value="Aggiungi Criptovaluta" />
  </form>
</div>

</div>

<div class="wallet">
  <div class="assets-box">
    @if(count($assets) < 1)
      <h3>Add an asset and follow your investments</h3>
    @else
    @foreach($assets as $asset)
    <div class="coin">
      <div class="center">
        <h2>{{ $asset->name }} ( {{ $asset->symbol }} )</h2>
      </div>
      <div class="info">
        <div class="coin__content">
          <h3>USD invested</h3>
          <p>{{ $asset->usd }} USD</p>
        </div>
        <div class="coin__content">
          <h3>Purchase price</h3>
          <p>{{ $asset->price }} USD</p>
        </div>
      </div>
      <div class="info">
        <div class="coin__content">
          <h3>Tokens</h3>
          <p>{{ $asset->value }} {{ $asset->symbol }}</p>
        </div>
        <div class="coin__content">
          <h3>Current price</h3>
            @foreach($data as $arr)
              @if($arr->name == $asset->name)
                <?php $quote = round($arr->quote->USD->price, 2) ?>
                <p>{{ $quote }} USD</p>
              @endif
            @endforeach
        </div>
      </div>
      <div class="center">
        <h3>Summary</h3>
        <?php $summary = round($asset->value*$quote-$asset->usd, 2); ?>
        @if($summary>0)
          <h3 class="bull">+{{ $summary }} USD</h3>
        @else
          <h3 class="bear">{{ $summary }} USD</h3>
        @endif
      </div>
      <form action="wallet/{{$asset->id}}" method="POST" class="delete_coin">
        @method('DELETE')
        @csrf

        <button
          onclick="if (confirm('Are you sure you want delete this asset?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
          type="submit" name="button">
          <img width="25px" src="src/img/trash.png" alt="Delete">
        </button>
      </form>
    </div>
    @endforeach
    @endif
  </div>
</div>

@endsection
