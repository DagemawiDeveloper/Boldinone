    @if(Session::has('message'))
        <div x-data="{show:true}" x-init="setTimeout(() => show =false, 3000)" x-show="show"
        class="alert alert-primary" role="alert">
             <p>{{ Session::get('message') }}</p>
             {{-- <button type="button" class="btn-close" @click="bannerOpen = false">X</button> --}}
        </div>
    @endif