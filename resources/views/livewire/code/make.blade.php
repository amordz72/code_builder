<div class="container">
    @section('title')
    Make
    @endsection
    <h1 class="text-center">{{$title}}</h1>

    <form wire:submit.prevent="submit">

        <!-- col-4 -->
        <div class="col-md-4">
            <!-- name -->
            <div class="row mb-3">
                <input type="text" wire:model="name" class="form-control">
                @error('name') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- col-8 -->
        <div class="col-md-8"></div>




        <button type="submit" class="btn btn-info">Save</button>
    </form>


  


</div>
