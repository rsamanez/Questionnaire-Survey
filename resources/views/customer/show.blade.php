<div>
    <h1>Customers Details</h1>
    <div><a href="/customers">< Back</a> </div>
    <p>
    <div>Name</div><div><strong>{{$customer->name}}</strong></div>
    <br>
    <div>Email</div>
        <div> ({{ $customer->email }})</div>
    <br>
    <div>
        <div><a href="/customers/{{$customer->id}}/edit">Edit </a>
            <span>
                <form action="/customers/{{$customer->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>
            </span>
        </div>
    </div>
</div>
