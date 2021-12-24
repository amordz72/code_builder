<div class="container">
    @section('title')
    Make
    @endsection
    {{-- <h1 class="text-center">{{$title}}</h1> --}}

    <div class="row">

        <!-- col-4 -->
        <div class="col-md-4">

            @if ($step==3||$step==2)

        </div>

        @else
        @endif
        <div class="mb-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"
                wire:model='use_i' wire:change='set_cookie("use_i","{{($use_i)=='1' ? '0':'1'  }}")'>
                <label class="form-check-label" for="inlineCheckbox1">Index</label>

                {{-- <hr>
                {{ $use_i}}
                <hr> --}}
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" wire:model='use_c' wire:change='set_cookie("use_c","{{($use_c)=='1' ? '0':'1'  }}")'>
                <label class="form-check-label" for="inlineCheckbox2">Create</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" wire:model='use_e' wire:change='set_cookie("use_e","{{($use_e)=='1' ? '0':'1'  }}")'>
                <label class="form-check-label" for="inlineCheckbox2">Edit</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" wire:model='use_s' wire:change='set_cookie("use_s","{{($use_s)=='1' ? '0':'1'  }}")'>
                <label class="form-check-label" for="inlineCheckbox2">Show</label>
            </div>


            <!-- code :select -->
            <div class="row mb-3">

                <label class="form-label col-sm-3 fw-bold">Code</label>

                <div class="col-sm-9 fw-bold">
                    <select class="form-select" wire:model='step' wire:change='make_livewire_component'>
                        <option selected class="fw-bold">Select Menu</option>
                        <option value="1">Create Component</option>
                        <option value="2">Route</option>
                        <option value="3">Other</option>
                    </select>
                </div>
            </div>

            <!-- name -->
            <div class="row mb-3">
                <div class="col-sm-6">
                    <input type="text" wire:model="name" class="form-control fw-bold" placeholder="Name">
                    @error('name') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
                </div>
                <!-- dir -->
                <div class="col-sm-6">
                    <input type="text" wire:model="dir" class="form-control fw-bold" placeholder="Dir">
                    {{-- @error('dir') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror --}}
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Save</button>

        </div>

        <!-- col-8 -->
        <div class="col-md-8">

            <h3 class="text-center"><span> Code</span> </h3>

            <div class="form-floating">
                <textarea class="form-control fw-bold m-2 fs-5" placeholder="Code here" wire:model='body' style="height: 300px"></textarea>

            </div>

        </div>

    </div>








</div>
