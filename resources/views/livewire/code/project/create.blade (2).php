<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1><span>Add Project</span></h1>

                <!-- name -->
                <div class="row mb-2">
                    <label for="" class="form-lablel col-2">Name</label>
                    <div class="col-10">

                        <input type="text" class="form-control" wire:model='name'
                        wire:change="set_env()"  >
                    </div>
                </div>
                <!-- db -->
                <div class="row mb-2">
                    <label for="" class="form-lablel col-2">DB</label>
                    <div class="col-10">
                        <input type="text" class="form-control" wire:model='db_name' wire:change="set_env()">
                    </div>
                </div>

                <!-- db_type -->
                <div class="row  mb-2">
                    <label for="" class="form-lablel col-2">DB Type</label>
                    <div class="col-10">
                        <select class="form-select" wire:model='db_type' wire:change="set_env()">
                            <option selected>Open this select menu</option>
                            <option value="mysql">Mysql</option>
                            <option value="2">Sqlite</option>
                            <option value="2">Postgrie</option>

                        </select>
                    </div>
                </div>

                <!-- path -->
                <div class="row mb-2">
                    <label for="" class="form-lablel col-2">Path</label>
                    <div class="col-10">
                        <input type="text" class="form-control" wire:model='path' wire:change="set_env()">
                    </div>
                </div>
                <!-- url -->
                <div class="row mb-2">
                    <label for="" class="form-lablel col-2">url</label>
                    <div class="col-10">
                        <input type="text" class="form-control" wire:model='url' wire:change="set_env()">
                    </div>
                </div>
                <div class="col-12">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                    @if ($is_new)
                    <button type="button" class="btn btn-info"  wire:click='store'>Add</button>

                    @else
                    <button type="button" class="btn btn-warning" wire:click='update({{ $hiddenId}})'>Update</button>
                    <button type="button" class="btn btn-danger"wire:click='destroy({{ $hiddenId}})'>Delete</button>


                    @endif

                        <button type="button" class="btn btn-secondary" wire:click='clear'>Clear</button>

                      </div><br>
                    <div class="btn-group mt-1" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-danger" wire:click='prev'><<</button>
                        {{-- <button type="button" class="btn btn-warning">Middle</button> --}}
                        <button type="button" class="btn btn-success" wire:click='next'>>></button>
                      </div>

                </div>
            </div>
            <div class="col-md-8">
                <!-- env -->
                <div class="row mb-2">
                    <label for="" class="form-lablel col-2">env</label>
                    <div class="col-10">
                        <div class="form-floating">
<textarea class="form-control py-2 fw-bold" style="height: 460px" wire:model='env'></textarea>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
