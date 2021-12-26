<div class="container">

    @section('title')
    CreateProject
    @endsection

    <div class="col-md-4">
        <input type="hidden" wire:model='hidden_id'>

        <!-- name -->
        <div class="row mb-3">
            <label  class="col-sm-3 form-label">Name :</label> 
            <div class="col-sm-9">
                <input type="text" wire:model="name" class="form-control fw-bold" placeholder="Name">
                @error('name') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- db -->
        <div class="row mb-3">
            <label  class="col-sm-3 form-label">Db Name :</label> 
            <div class="col-sm-9">
                <input type="text" wire:model="db" class="form-control fw-bold" placeholder="Db Name">
                @error('db') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>
        <!-- url -->
        <div class="row mb-3">
     <label  class="col-sm-3 form-label">Url :</label>     
        <div class="col-sm-9">
               
                <input type="text" wire:model="url" class="form-control fw-bold" placeholder="Url">
                @error('url') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary" wire:click='store'>Get Str</button>
        </div>

    </div>
    <div class="col-md-8">

<div>    {{$projects->links()}} </div>
    
    </div>


</div>
