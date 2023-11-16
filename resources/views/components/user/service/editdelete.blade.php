@props(['editservice'])
<div class="card-img-overlay">
    <a href="{{route('user.service.edit', $service->id)}}" class="btn btn-success btn-icon-split float-right m-1">
        <span class="icon text-white-50">
            <i class="fa fa-pen" style="color: #ffffff;"></i>
        </span>
    </a>
    <form method="POST" action=""
        onsubmit="return confirm('Are you sure?')" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-icon-split float-right m-1">
            <span class="icon text-white-30">
                <i class="fas fa-trash"></i>
            </span>
        </button>
    </form>
</div>