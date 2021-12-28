<div>

    <!-- start -->
    <div class="row mx-1 pt-2">
        <div class="col-sm-12 mb-2">
            <h2 class="text-center ">
                <span class="px-3 py-1 fw-bold rounded-3 {{ ($code_mode)==true?'bg-info':'bg-success text-white' }}">
                    {{ $code_mode === true ? "Code Mode" : "Design Mode" }}

      </span>
     </div>
        <!-- col5 -->
        <div class="col-md-5 mt-2">
            </h2>

            <!-- projects -->
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-8">
                    <select class="form-select" wire:model='proj_id'>
                        <option selected value="0">Open this select menu</option>
                        @foreach ($projs as $item)
                        <option value="{{ $item ->id }}">{{ $item ->name }}</option>
                        @endforeach



                    </select>
                </div>
                <a href="{{ route('project.create') }}" class="btn btn-secondary btn-sm col-sm-2 " tabindex="-1" role="button">New</a>
            </div>
            <!-- /projects -->

            <!-- tables -->
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">names</th>
                        <th scope="col">model</th>
                        <th scope="col">soft_delete</th>
                        <th scope="col">Childs</th>
                        @if ($code_mode)


                        @else



                        @endif
                        <th scope="col">Action</th>






                    </tr>
                </thead>
                <tbody>



                    @foreach ($tables as $item)

                    <tr>

                        <td scope="row">{{ $item ->id}}</td>
                        <td scope="row">{{ $item ->name }}</td>
                        <td scope="row">{{ $item ->names }}</td>
                        <td scope="row">{{ $item ->model_name }}</td>

                        <td scope="row">
                            <input type="checkbox" {{ ($item ->soft_delete==1?'checked':'') }}>
                        </td>
                        <td scope="row">
                            @foreach ($item ->childs as $ch)
                            {{ $ch->name }} <span class="text-danger fw-bold">//</span>
                            @endforeach
                        </td>
                        <td scope="row">
                            <button class="btn btn-primary btn-sm"
wire:click='setCols({{ $item ->id}},"{{$item ->name}}","{{$item ->names}}","{{$item ->model_name}}")'>Set</button>




                            {{-- <button class="btn btn-warning btn-sm" wire:click='setCols( {{ $item ->id}})'>Edit</button> --}}
                        </td>
                        @if ($code_mode)



                        @else

                        @endif







                    </tr>


                    @endforeach


                </tbody>
            </table>
            <!-- /tables -->

        </div>
        <!-- /col5 -->

        <!-- col7 -->
        <div class="col-md-7 bg-light mt-2 py-2 ">
            <input class="form-check-input border border-dark" type="checkbox" wire:model='code_mode'>
            <label for="">Change Mode</label>
            <div class="mb-1 bg-   px-2 py-2">

                @if ($code_mode)
                <div class="">
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow bs-pink" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.run') }}">Run</button>
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.save') }}">Save</button>


                    <button type="button" class="btn btn-primary btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}" wire:click='model_code'>Model</button>

                    <button type="button" class="btn btn-warning btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Controllet</button>

                    <button type="button" class="btn btn-danger btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Livewire</button>

                    <button type="button" class="btn btn-info btn-sm fw-bold text-white shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}" style="background: #3d0a91">Route Livewire</button>

                    <button type="button" class="btn btn-info btn-sm fw-bold text-white shadow" style="background:  #ab296a" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Route </button>
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Save All </button>

                </div>
                @else
                <div class="">
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow bs-pink" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.run') }}">Run</button>
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.save') }}">Save</button>

                    <button type="button" class="btn btn-info btn-sm fw-bold shadow bs-pink" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.run') }}">Page</button>
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.save') }}">Page Table</button>


                    {{-- <button type="button" class="btn btn-primary btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Model</button>

                    <button type="button" class="btn btn-warning btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Controllet</button>

                    <button type="button" class="btn btn-danger btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Livewire</button>

                    <button type="button" class="btn btn-info btn-sm fw-bold text-white shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}" style="background: #3d0a91">Route Livewire</button>

                    <button type="button" class="btn btn-info btn-sm fw-bold text-white shadow" style="background:  #ab296a" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Route </button>
                    <button type="button" class="btn btn-info btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Save All </button> --}}

                </div>
                @endif

                {{-- <button type="button" class="btn btn-info btn-sm fw-bold shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('code.create_mc') }}">Save All </button> --}}





            </div>
            <div class="form-floating">
                <textarea class="form-control p-2 pt-2 mt-3 fw-bold text-dark" style="height: 400px" wire:model='body'></textarea>

            </div>
            <!-- cols -->
            <div class="col-12 mt-3">
                <div class="mb-1 bg-info text-black fw-bold px-2 py-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Select All</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Table</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Button</label>
                    </div>


                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>


                            <th scope="col">type</th>
                            <th scope="col">selected</th>
                            <th scope="col">where</th>

                            @if ($code_mode)


                            <th scope="col">lenght</th>
                            <th scope="col">hidden</th>
                            <th scope="col">null</th>
                            <th scope="col">default</th>
                            <th scope="col">table_parent</th>
                            <th scope="col">col_parent</th>
                            @else

                            <th scope="col">control</th>
                            <th scope="col">label</th>

                            @endif
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody style="background: rgba(255, 252, 252, 0.76)">

                        {{-- {{ dd($data) }} --}}

                        @foreach ( $cols as $key=> $item)

                        <tr>

                            <td scope="row">{{ $key +1 }}</td>
                            <td scope="row">{{ $item->name  }}</td>
                            <td scope="row">{{ $item->type  }}</td>

                            <td scope="row">
                                <input type="checkbox" {{ ($item ->sel==1?'checked':'') }} wire:change='update_sel({{ $item->id  }},{{ ($item ->sel==1?'0':'1') }})'></td>

                            <td scope="row">
                                <input type="checkbox" {{ ($item ->if==1?'checked':'') }} wire:change='update_if({{ $item->id  }},{{ ($item ->if==1?'0':'1') }})'>
                            </td>



                            @if ($code_mode)

                            <td scope="row">

                                {{-- wire:value='col_type' {{ $item->count }} <input type="text" class='form-control' value=""> --}}

                                {{ $item->count }}
                                {{-- wire:change='update_count({{ $item->id }})'
                                name='col_count' --}}



                            </td>

                            <td scope="row">
                                <input type="checkbox" {{ ($item ->hidden==1?'checked':'') }} wire:change='update_hidden({{ $item->id  }},{{ ($item ->hidden==1?'0':'1') }})'>


                            </td>
                            <td scope="row">
                                <input type="checkbox" {{ ($item ->null==1?'checked':'') }} wire:change='update_null({{ $item->id  }},{{ ($item ->null==1?'0':'1') }})'>
                            </td>

                            <td scope="row">{{ $item->default }}</td>
                            <td scope="row">{{ $item->table_parent }}</td>
                            <td scope="row">{{ $item->col_parent }}</td>
                            @else
                            <td scope="row">
                                <select class="form-select">

                                    @foreach ($controles as $cn)
                                    <option>{{ $cn->name  }}</option>
                                    @endforeach

                                </select>
                            </td>
                            <td scope="row">lbl_{{ $item->name }}</td>


                            @endif

                            <td scope="row"><button class="btn btn-sm btn-danger" wire:click='delete_col({{ $item->id }})'>Deletel</button></td>


                        </tr>


                        @endforeach


                    </tbody>
                </table>

            </div>
            <!-- /cols -->
        </div>
        <!-- /col7 -->

    </div>
    <!-- /row -->


</div>
