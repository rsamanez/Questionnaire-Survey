<h1>My Services</h1>
    <div class="container">
        @foreach($services as $serv)
            <li>{{$serv->name}}</li>
        @endforeach
    </div>

<p><h1>Add New Service</h1></p>
<form action="/services" method="post" autocomplete="off">
    @csrf
    <input type="text" name="name">
    <button>Add New Service</button>
    <div style="color:red">
    @error('name') {{$message}} @enderror
    </div>
</form>
