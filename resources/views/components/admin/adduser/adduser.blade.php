@props(['adduser'])
<div class="col-xl-5 col-md-6 mb-2">
  <form method="POST" action="{{ route('admin.adduser.store') }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Invite user</label>
      <input type="text" name="invite" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">invite</button>
  </form>
</div>