<div class="container-fluid ^bg-info  ">
    @section('title')
    Create Code
    @endsection
    <style>
        .ltr {
            direction: ltr;
        }

        #code_body {
            height: 300px;
            direction: ltr;
        }
    </style>

    <div class="container-fluid mt-3 ltr fw-bold">
        <div class="row  ">
            <div class=" gap-2 d-md-flex flex-column justify-content-md-start mb-2  col-md-5">

                <!-- tbl_name -->
                <div class="col-sm-6">
                    <div class="mb-2 row">
                        <label for="tableName" class="col-sm-4  form-label">TableName :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" wire:model='tbl_name'>
                        </div>
                    </div>
                </div>
                <form class="form row">
                    <div class="col-4">
                        <!-- column -->
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Column:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control " wire:model='col_name'>
                            </div>
                        </div>
                    </div>
                    <!-- type -->
                    <div class="col-5">
                        <div class="row">
                            <label for="cbx_dataType" class="col-12 form-label"> Type :</label>
                            <select class=" col-sm-12  form-select" wire:model='col_type'>
                                <option value="">Select</option>
                                <option>bigIncrements</option>
                                <option>bigInteger</option>
                                <option>binary</option>
                                <option>boolean</option>
                                <option>char</option>
                                <option>dateTimeTz</option>
                                <option>dateTime</option>
                                <option>date</option>
                                <option>decimal</option>
                                <option>double</option>
                                <option>enum</option>
                                <option>float</option>
                                <option>foreignId</option>
                                <option>foreignIdFor</option>
                                <option>foreignUuid</option>
                                <option>geometryCollection</option>
                                <option>geometry</option>
                                <option>id</option>
                                <option>increments</option>
                                <option>integer</option>
                                <option>ipAddress</option>
                                <option>json</option>
                                <option>jsonb</option>
                                <option>lineString</option>
                                <option>longText</option>
                                <option>macAddress</option>
                                <option>mediumIncrements</option>
                                <option>mediumInteger</option>
                                <option>mediumText</option>
                                <option>morphs</option>
                                <option>multiLineString</option>
                                <option>multiPoint</option>
                                <option>multiPolygon</option>
                                <option>nullableMorphs</option>
                                <option>nullableTimestamps</option>
                                <option>nullableUuidMorphs</option>
                                <option>point</option>
                                <option>polygon</option>
                                <option>rememberToken</option>
                                <option>set</option>
                                <option>smallIncrements</option>
                                <option>smallInteger</option>
                                <option>softDeletesTz</option>
                                <option>softDeletes</option>
                                <option>string</option>
                                <option>text</option>
                                <option>timeTz</option>
                                <option>time</option>
                                <option>timestampTz</option>
                                <option>timestamp</option>
                                <option>timestampsTz</option>
                                <option>timestamps</option>
                                <option>tinyIncrements</option>
                                <option>tinyInteger</option>
                                <option>tinyText</option>
                                <option>unsignedBigInteger</option>
                                <option>unsignedDecimal</option>
                                <option>unsignedInteger</option>
                                <option>unsignedMediumInteger</option>
                                <option>unsignedSmallInteger</option>
                                <option>unsignedTinyInteger</option>
                                <option>uuidMorphs</option>
                                <option>uuid</option>
                                <option>year</option>
                            </select>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-3">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Length:</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control " wire:model='col_lenght'>
                            </div>
                        </div>
                    </div>
                    <!-- col_def -->
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-12 col-form-label">Default:</label>
                            <div class="col-sm-12">
                                <select id="columnDefault" class="form-select" wire:model='col_def'>
                                    <option value="NONE"> None </option>
                                    <option value="USER_DEFINED"> As defined </option>
                                    <option> NULL </option>
                                    <option> CURRENT_TIMESTAMP </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- USER_DEFINED_val -->
                    @if ( $col_def=='USER_DEFINED')
                    <div class="col-4">
                        <label for="USER_DEFINED_val" class="form-label">Enter :</label>
                        <input type="text" class="form-control" wire:model='col_def_enter'>
                    </div>
                    @endif
                    <!--  -->
                    <div class="col-4">
                        <div class="form-group row"><label for="staticEmail"
                                class="col-sm-12 col-form-label">Index:</label>
                            <div class="col-sm-12">
                                <select id="Index" class="form-select" wire:model='col_index'>
                                    <option value="none">---</option>
                                    <!--v-if-->
                                    <option title="Unique"> UNIQUE </option>
                                    <option title="Fulltext">
                                        FULLTEXT
                                    </option>
                                    <option title="Spatial">
                                        SPATIAL
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="form-groub  ">
                    <button class="btn btn-primary me-md-2 text-dark
                     text-white fw-bold" wire:click='add'>Add</button>

                </div>
            </div>
            <div class="mb-3 col-md-7  ">
                <textarea class="form-control fw-bold" id="code_body" cols="12" wire:model='body'></textarea>
            </div>

            <div class="mt-1 row">
                <table class="table table-dark table-hover table-sm table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">column</th>
                            <th scope="col">type</th>
                            <th scope="col">Length</th>
                            <th scope="col">Default</th>
                            <th scope="col"> DEFINED Val</th>
                            <th scope="col">Index</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">

                        @foreach ($cols as $item)
                        <tr>
                            <td scop='row'>{{ $item['name'] }}</td>
                            <td scop='row'>{{ $item['type'] }}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
