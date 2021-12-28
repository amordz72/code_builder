<div class="container">
    <div class="row">

        <div class="col-md-4 mt-2">
            <h1 class="text-center ">Add Table</h1>

            <div class="row mb-2">

                <label for="" class="col-sm-2">Project</label>
                <div class="col-sm-8">

                    <select class="form-select" wire:model='project_id'>
                        <option selected value="0">Open this select menu</option>

                        @foreach ($projects as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach


                    </select>

                </div>
                <a class="col-sm-2 btn btn-outline-primary" href="{{ route('project.create') }}">New</a>
            </div>


            <div class="row mb-2">
                <label for="" class="col-sm-2">Table Name</label>
                <div class="col-sm-10">
                    <input class="form-control" wire:model='name' wire:change='setNames'>
                </div>

            </div>
            <div class="row mb-2">
                <label for="" class="col-sm-2">Plu Name</label>
                <div class="col-sm-10">
                    <input class="form-control" wire:model='names'>
                </div>

            </div>
            <div class="row mb-2">
                <label for="" class="col-sm-2">Model Name</label>
                <div class="col-sm-10">
                    <input class="form-control" wire:model='model_name'>
                </div>

            </div>




            <div class="row mb-2">
                <label for="" class="col-sm-2">Soft Delete</label>
                <div class="col-sm-10">
                    <input class="form-check" type="checkbox" wire:model='soft_delete'>
                </div>
            </div>

            @if ($is_new)
            <button type="button" class="btn btn-info" wire:click='store'>Add</button>

            @else
            <button type="button" class="btn btn-warning" wire:click='update({{ $hiddenId}})'>Update</button>
            <button type="button" class="btn btn-danger" wire:click='destroy({{ $hiddenId}})'>Delete</button>


            @endif
            <button type="button" class="btn btn-secondary" wire:click='clear'>Clear</button>

        </div>

        <div class="col-md-8 mt-5">

            <table class="table table-hover table-responsive table-bordered">
                <thead class='table-dark'>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Names</th>
                        <th scope="col">Model Name</th>
                        <th scope="col">Soft Delete</th>
                        <th scope="col">Project</th>
                        <th scope="col">Columns</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($all as $item)
                    <tr>
                        <th scope="row">{{ $item ->id}}</th>
                        <td>{{ $item ->name}}</td>
                        <td>{{ $item ->names}}</td>
                        <td>{{ $item ->model_name}}</td>
                        <td><input type="checkbox" {{ ($item->soft_delete==1)?'checked':''}}> </td>
                        <td>{{ $item->project ->name}}</td>

                        <td scope="row">
                            @foreach ($item->cols as $key=> $col)


                            @if ( $key >0)
                            <span class="text-danger fw-bold">//</span>
                            {{ $col->name }}
                            @else
                            {{ $col->name }}
                            @endif

                            @endforeach
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" wire:click='edit({{ $item->id }})'>
                                Edite</button>
                            <button class="btn btn-danger btn-sm" wire:click='destroy({{ $item->id }})'>
                                Delete</button>

                            {{-- --}} {{-- --}}


                            <a class="btn btn-primary btn-sm" href="{{ route('col.create',$item->id) }}">
                                Add Columns</a>




                        </td>

                    </tr>
                    @endforeach


                </tbody>
            </table>




        </div>
    </div>

    @push('scripts')
    <script type="text/javascript">


    </script>
    @endpush

</div>
