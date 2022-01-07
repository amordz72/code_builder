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
                <div>
                    @include('livewire.code.strapi.cols_create_model')
                    @include('livewire.code.strapi.cols_update_model')
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

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Columns</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Code</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                        type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings"
                        type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- table cols -->
                    <table class="table  table-hover table-bordered ">
                        <thead class=" table-dark ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Sel</th>
                                <th scope="col">If</th>
                                <th scope="col">Lenght</th>
                                <th scope="col">Index</th>
                                <th scope="col">Default</th>
                                <th scope="col">Parent</th>
                                <th scope="col">Rel Type</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cols as $key=> $col)

                            <tr>
                                <th scope="row">{{ $key }}</th>

                                <td>{{ $col->name }}</td>
                                <td>{{ $col->type }}</td>
                                <td>{{ $col->sel }}</td>
                                <td>{{ $col->if }}</td>
                                <td>{{ $col->lenght }}</td>
                                <td>{{ $col->index }}</td>
                                <td>{{ $col->default }}</td>
                                <td>{{ $col->parent }}</td>

                                <td>{{ $col->rel_type }}</td>



                                <td>
                                    <input type="button" value="Edit"
                                    class="btn btn-sm btn-warning fw-bold"
                                     wire:click="edit({{ $col->id }})"
                                     data-bs-toggle="modal" data-bs-target="#colsUpdateModal">

                                    <input type="button" value="Del"
                                    class="btn btn-sm btn-danger fw-bold"
                                    wire:click="destroy_col({{ $col->id }})">

                                    </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile</div>
                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">messages</div>
                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">settings</div>
            </div>


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
        }); /*  */






    </script>

    <script>
        var firstTabEl = document.querySelector('#myTabCols li:last-child a')
    var firstTab = new bootstrap.Tab(firstTabEl)

    firstTab.show()
        var myTabCols_u = document.querySelector('#myTabCols_u li:last-child a')
    var firstTab = new bootstrap.Tab(myTabCols_u)

    firstTab.show()


    </script>

</div>
