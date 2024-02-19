<div class="card">
    <div class="card-header pb-0 border-0">
    </div>
    <div class="card-body">
        <form action="{{route('index')}}" method="GET">
        <input value="{{request('search','')}}" name="search" placeholder="Search with Name..." class="form-control w-100" type="text">
        <button class="btn btn-dark mt-2"> Search</button>
        </form>
    </div>
</div>