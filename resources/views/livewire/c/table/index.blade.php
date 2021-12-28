<div class="container mt-3">

    <h1 class="text-center">All Projects</h1>


        <table class="table table-hover table-responsive  table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">soft_delete</th>
                    <th scope="col">project_id</th>


                    {{--    <th scope="col">Action</th> <th scope="col">Env</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($tables as $item)
                <tr>
                    <td scope="row"> {{ $item->id }}</td>
                    <td scope="row"><a href="{{ route('project.show') }}">{{ $item->name }}</a> </td>
                    <td scope="row">
                   {{ $item->soft_delete }}  </td>
                    <td scope="row">{{ $item->project_id }}</td>

                </tr>
                @endforeach

            </tbody>
        </table>








        <div class="d-flex justify-content-center ">
            {{ $tables->links() }}

        </div>
    </div>
