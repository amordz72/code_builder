<div class="container">



    <div class="row">




        <!-- c4 -->
        <div class="col-4">
            <div class="div  fw-bold text-blak ">
                <!-- projs -->
                <div class="row">
                    <label for="" class="form-label fw-bold h4 col-2">Project :</label>
                    <select wire:model='proj_id' class="form-select col-8  mb-2 ">
                        <option value="">select</option>
                        @foreach ($projs as $item)
                        <option value="{{ $item ->id}}">{{ $item ->name}}</option>
                        @endforeach

                    </select>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tbls -->
                <select wire:model='tbl_id' class="form-select">
                    <option value="">select</option>
                    @foreach ($tbls as $item)
                    <option value="{{ $item ->id}}">{{ $item ->name}}</option>
                    @endforeach

                </select>
            </div>

        </div>
        <!-- c8 -->
        <div class="col-8">



        </div>



    </div>






</div>
