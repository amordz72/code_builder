<div class="container">



    <div class="row">




        <!-- c4 -->
        <div class="col-4">
            <div class="div  fw-bold text-blak ">
                <!-- projs -->
                <div class="row">
                    <label for="" class="form-label fw-bold  col-md-3">Project :</label>
                    <div class="col-md-7">
                        <select wire:model='proj_id' class="form-select  mb-2 ">
                            <option value="">select</option>
                            @foreach ($projs as $item)
                            <option value="{{ $item ->id}}">{{ $item ->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    @include('livewire.code.strapi.project_create_model')

                </div>
                <!-- tbls -->

                <div class="row">
                    <label for="" class="form-label fw-bold  col-md-3">Table :</label>
                    <div class="col-md-7">
                        <select wire:model='tbl_id' class="form-select">
                            <option value="">select</option>
                            @foreach ($tbls as $item)
                            <option value="{{ $item ->id}}">{{ $item ->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    @if ($proj_id>0)

                    @include('livewire.code.strapi.table_create_model')
                    @endif

                </div>
            </div>

        </div>
        <!-- c8 -->
        <div class="col-8" style="background: #eee">
            @if (session()->has('message'))
            <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
            </div>
            @endif


        </div>



    </div>




  <script type="text/javascript">
        window.livewire.on('Project_Store', () => {
            $('#projectModal').modal('hide');
        });
        window.livewire.on('Tbl_Store', () => {
            $('#tableModal').modal('hide');
        });
        window.livewire.on('cols_Store', () => {
            $('#colsModal').modal('hide');
        });
    </script>


</div>
