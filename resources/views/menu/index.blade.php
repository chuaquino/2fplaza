@extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Menu CRUD</h1>
    </div>
  </div>
  <div class="row">
    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>Menu Name</th>
        <th>Menu Description</th>
        <th>Menu Price</th>
        <th>Menu Date</th>
        <th>Actions</th>
      </tr>
      <a href="{{route('menu.create')}}" class="btn btn-info pull-right">Create New Data</a><br><br>
      <?php $no=1; ?>
      @foreach($menus as $menu)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$menu->menuName}}</td>
          <td>{{$menu->menuDesc}}</td>
          <td>{{$menu->menuPrice}}</td>
          <td>{{$menu->menuDate}}</td>
          <td>
            <form class="" action="{{route('menu.destroy',$menu->id)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-primary">Edit</a>
              <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data');" name="name" value="delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  @stop
