@extends('layouts.app')
  @section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>Menu for Today</h1>
      </div>
    </div>

    <div class="row">
    <div class="col-md-12">
      @foreach($menus as $menu)
        <form role="form" method="POST" action="">
          <label>{{ $dateString }}</label><br/>
          <label>{{ $menu->menuName }}</label><br/>
          <label>{{ $menu->menuPrice }}</label>
          <input type="text" name="guests_id" value={{ Auth::user()->id }} hidden><br/>
          <input type="text" name="menus_id" value={{ $menu->id }} hidden>
          <label>{{ $menu->menuCatName }}</label>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Order
                  </button>
              </div>
          </div>
        </form>
      @endforeach
    </div>
    </div>


@stop
