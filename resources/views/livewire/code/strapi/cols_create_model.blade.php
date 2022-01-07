<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info text-dark col-2" data-bs-toggle="modal" data-bs-target="#colsModal">
    New
</button>

<!-- Modal Project -->
<div class="modal fade" wire:ignore.self id="colsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- name -->
            <div class="modal-body row">
                <label for="" class="form-label fw-bold  col-md-2">Name :</label>

                <!-- tps -->
                <div class="col-md-10">

                    <ul class="nav nav-tabs" id="myTabCols" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                                type="button" role="tab" aria-controls="messages"
                                aria-selected="false">Messages</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings"
                                type="button" role="tab" aria-controls="settings"
                                aria-selected="false">Settings</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">home</div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile</div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">messages
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">settings
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click='Store_Tbl()'>Save changes</button>
            </div>
        </div>
    </div>
</div>
