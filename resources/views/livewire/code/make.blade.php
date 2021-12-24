<div class="container">
    @section('title')
    Make
    @endsection
    <h1 class="text-center">{{$title}}</h1>

    <div class="row">

        <!-- col-4 -->
        <div class="col-md-4">
            <div class="row mb-3">
                <select class="form-select" wire:model='step' wire:change='make_livewire_component'>
                    <option selected>select menu</option>
                    <option value="1">Create Component</option>
                    <option value="2">Route</option>
                    <option value="3">Other</option>
                </select>
            </div>

            <form wire:submit.prevent="submit">
                <!-- steps -->


                <!-- name -->
                <div class="row mb-3">
                 <div class="col-sm-6">
                      <input type="text" wire:model="name" class="form-control">
                    @error('name') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
              </div>
                 <div class="col-sm-6">
                       <input type="text" wire:model="dir" class="form-control">
                    {{-- @error('dir') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror --}}
              </div>
             </div>


                <button type="submit" class="btn btn-info">Save</button>
            </form>
        </div>

        <!-- col-8 -->
        <div class="col-md-8">

            <h3>Code</h3>

            <div class="form-floating">
                <textarea class="form-control fw-bold m-2 fs-5" placeholder="Code here" wire:model='body' style="height: 300px"></textarea>

            </div>

        </div>

    </div>








</div>
