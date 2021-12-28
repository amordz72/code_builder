<div class="container mt-3">

    <h1 class="text-center">All Project</h1>
    <div class="mb-2">
<a class="btn btn-md btn-info" href="{{ route('project.create') }}">Add</a>
</div>
    <table class="table table-hover table-responsive  table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">DB</th>
                <th scope="col">DB type</th>
                {{-- <th scope="col">Path</th> --}}
                <th scope="col">Url</th>
                <th scope="col">Tables</th>

                {{----}}
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($projs as $item)
            <tr>
                <td scope="row"> {{ $item->id }}</td>
                <td scope="row"><a href="{{ route('project.show') }}">{{ $item->name }}</a> </td>
                <td scope="row"><a href="{{ route('table') }}">{{ $item->db_name }}</a> </td>
                <td scope="row"> {{ $item->db_type }}</td>
                {{-- <td scope="row"> {{ $item->path }}</td> --}}
                <td scope="row"><a href="{{ $item->url }}">{{ $item->url }} </a></td>

                <td scope="row">

                    @foreach ( $item->tables as $key =>$tbl)
                   @if ( $key >0)
                <span class="text-danger fw-bold">//</span>    {{ $tbl->name }}
                   @else
                   {{ $tbl->name }}
                   @endif
                    @endforeach
                </td>


                <td scope="row"><a href="{{
                route(
                    'table.create', $item->id
                    )
                }}">Add Table</a></td>


                {{-- <td scope="row"> {{ $item->env }}</td>--}}
            </tr>
            @endforeach

        </tbody>
    </table>



    <div class="d-flex justify-content-center ">
        {{ $projs->links() }}

    </div>
</div>
