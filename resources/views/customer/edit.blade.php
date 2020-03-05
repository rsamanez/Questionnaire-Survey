<h1>Edit Customer</h1>
<form action="/customers/{{$customer->id}}" method="post">
    @method('PATCH')
    @include('customer.form')
    <button>Update Customer</button>
</form>
