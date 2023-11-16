@props(['viewservice'])
 <!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card-columns">
            @foreach ($list_service as $service)
                <div class="card">
                <img src="{{asset('img/service/massage.jpg')}}" class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title">{{ $service['service_name' ]}}</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="{{asset('img/service/cleaning2.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>