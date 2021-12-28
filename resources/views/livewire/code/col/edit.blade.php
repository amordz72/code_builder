<div class="container">
    <div class="row">

        <div class="col-md-12 mt-2">
            {{-- <h1 class="text-center ">Add Columns</h1> --}}

            <div class="row mb-2">

                <label for="" class="col-sm-2">Column</label>
                <div class="col-sm-8">

                    <select class="form-select" wire:model='col_id' >
                        <option selected value="0">Open this select menu</option>

                        @foreach ($cols as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach {{----}}


                    </select>

                </div>
                <a class="col-sm-2 btn btn-outline-primary" href="{{ route('table.create') }}">New</a>
            </div>



            <div class="row mb-2">
                <label for="" class="col-sm-2">Column Name</label>
                <div class="col-sm-10">
                    <input class="form-control" wire:model='col_name'>
                    @error('col_name') <span class="text-danger fw-bold text-center" role="alert">{{ $message }}</span> @enderror

                </div>

            </div>
            <div class="row mb-2">
                <div class="row mb-2">
                    <label for="" class="col-sm-2"> Select</label>
                    <div class="col-sm-10">
                        <input class="form-check-inline" type="checkbox" wire:model='is_sel'>
                    </div>
                    <label for="" class="col-sm-2"> Where</label>
                    <div class="col-sm-10">
                        <input class="form-check-inline" type="checkbox" wire:model='is_if'>

                    </div>
                </div>
                <label for="" class="col-sm-2">Type</label>
                <div class="col-sm-8">

                    <select class="form-select" wire:model='col_type' {{-- wire:change='set_count' --}}>
                        <option selected value="0">Open this select menu</option>

                        @foreach ($types as $ty)
                        <option  >{{ $ty->name }}</option>
                        @endforeach
                        {{----}}

                    </select>
                    @error('col_type') <span class="text-danger fw-bold text-center" role="alert">{{ $message }}</span> @enderror

                </div>
                <a class="col-sm-2 btn btn-outline-primary" href="{{ route('data_type.create') }}">New</a>
            </div>
            <div class="row mb-2">
                <label for="" class="col-sm-2">Lenght</label>
                <div class="col-sm-10">
                    <input class="form-control" wire:model='col_count'>
                </div>

            </div>


            <div class="row mb-2">
                <label for="" class="col-sm-2"> Null</label>
                <div class="col-sm-10">
                    <input class="form-check" type="checkbox" wire:model='is_null'>
                </div>
            </div>
            <div class="row mb-2">

                <label for="" class="col-sm-2">Index</label>
                <div class="col-sm-8">

                    <select class="form-select" wire:model='col_index'>
                        <option selected value="">Open this select menu</option>

                        <option>UNIQUE</option>
                        <option>INDEX</option>

                        <option>SPATIAL</option>
                        <option>FULLTEXT</option>



                    </select>

                </div>
                <a class="col-sm-2 btn btn-outline-primary" href="{{ route('table.create') }}">New</a>
            </div>


            <div class="row mb-2">
                <label for="" class="col-sm-2">Default</label>
                <div class="col-sm-10">
                    <input class="form-control" wire:model='col_default'>
                </div>

            </div>

            <div class="row mb-2">
                <label for="" class="col-sm-2"> Hidden</label>
                <div class="col-sm-10">
                    <input class="form-check" type="checkbox" wire:model='is_hidden'>
                </div>
            </div>
            <div class="row mb-2">
                <label for="" class="col-sm-2"> Parent</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" wire:model='col_table_parent'>
                </div>
            </div>
            <div class="row mb-2">
                <label for="" class="col-sm-2"> Parent ID</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" wire:model='col_col_parent'>
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


    </div>
</div>
