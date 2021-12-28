<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row mb-2">
                    <label for="" class="col-sm-2">Type Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" wire:model='name' wire:change=''>
                        @error('name') <span class="text-danger fw-bold text-center" role="alert">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4">
                         @if ($is_new)
                        <button type="button" class="btn btn-info" wire:click='store'>Add</button>

                        @else
                        <button type="button" class="btn btn-warning" wire:click='update({{ $hiddenId}})'>Update</button>
                        <button type="button" class="btn btn-danger" wire:click='destroy({{ $hiddenId}})'>Delete</button>

                        @endif

                        <button type="button" class="btn btn-secondary" wire:click='clear'>Clear</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">


                <table class="table table-hover table-responsive table-bordered">
                    <thead class='table-dark'>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>


                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($types as $item)
                        <tr>
                            <th scope="row">{{ $item ->id}}</th>
                            <td>{{ $item ->name}}</td>
                            <td> <button class="btn btn-warning btn-sm" wire:click='edit({{ $item->id }})'>
                                    Edite</button>
                                <button class="btn btn-danger btn-sm" wire:click='destroy({{ $item->id }})'>
                                    Delete</button></td>


                        </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>


        </div>
    </div>
</div>
