<div class="container row">

    @section('title')
    Create Bank Code
    @endsection

    <div class="col-md-4">
        <div>
            <input type="hidden" wire:model='hidden_id'>
        </div>

        <!-- Langs -->
        <div class="row mb-3">
            <label class="col-sm-3 form-label">Lang :</label>
            <div class="col-sm-9">
                <select class="form-select" wire:model='lang_id'>
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
         
                  </select>
                @error('title') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- name -->
        <div class="row mb-3">
            <label class="col-sm-3 form-label">Title :</label>
            <div class="col-sm-9">
                <input type="text" wire:model="title" class="form-control fw-bold"
                 placeholder="title">
                @error('title') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- db -->
        <div class="row mb-3">
            <label class="col-sm-3 form-label">Body :</label>
            <div class="col-sm-9">
                <input type="text" wire:model="body" class="form-control fw-bold" placeholder="body">
                @error('body') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- url -->
        <div class="row mb-3">
            <label class="col-sm-3 form-label">Notes :</label>
            <div class="col-sm-9">

                <input type="text" wire:model="notes" class="form-control fw-bold" placeholder="notes">
                @error('notes') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="row ">
            <button type="button" class="btn btn-success col-3 me-1" wire:click='store'>Save</button>
            <button type="button" class="btn btn-warning col-3 me-1" wire:click='update'>Update</button>
            <button type="button" class="btn btn-danger col-3 me-1" wire:click='destroy'>Delete</button>

        </div>
    </div>


    <div class="col-md-8">

        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($banks as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>

                    <td>
                        <button class="btn btn-warning btn-sm" wire:click='edit({{  $item->id }})'>Edit</button>
                    </td>
                </tr>
                @endforeach




            </tbody>
        </table>

        <div class="flex mt-2">
            {{$projects->links()}}
        </div>
    </div>


</div>
