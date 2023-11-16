@props(['permissions'])
<div class="col-xl-5 col-md-6 mb-2">
  <form method="POST" action="{{ route('admin.permissions.store') }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Which permission you would like to add?</label>
      <input type="text" name="permission_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>