<div>
    <h1>Customers List</h1>
    <div><a href="/customers/create">Create New Customer</a> </div>
    <div>
        <a href="/customers?active=1">Active Customers</a>
        <a href="/customers?active=0">Inactive Customers</a>
    </div>
    <p>
        @forelse($customers as $customer)
            <li><a href="/customers/{{$customer->id}}"><strong>{{$customer->name}}</strong> </a>({{ $customer->email }})</li>
        @empty
            <div>there are no customers</div>
        @endforelse
    </p>
</div>
