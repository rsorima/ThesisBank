<style>
    .modal-body .current-password,
    .modal-body .new-password,
    .modal-body .confirm-password {
        width: 45%;
    }

    .cp-error-message,
    .gr-error-message {
        color: red;
    }
</style>
<div class="modal fade change-password-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class='container'>
                    <label class='session_password' hidden><?php echo $_SESSION['pword']; ?></label>
                    <label class='cp-error-message'></label><br>
                    <label>Current Password: </label>
                    <input type='password' class='form-control current-password' placeholder='Current Password' />
                    <br>
                    <label>New Password: </label>
                    <input type='password' class='form-control new-password' placeholder='New Password' />
                    <label>Confirm New Password: </label>
                    <input type='password' class='form-control confirm-password' placeholder='Confirm Password' />
                    <p id='message'></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-change-password">Change</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!--
<div class="modal fade" id="modalAddGroups" role="dialog">
    <div class="modal-dialog modal-md">
        <form id="form-user" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    <h4 class="modal-title">Add Group</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p class='gr-error-message'></p>
                        <label>Group name:</label>
                        <input type="text" class="form-control" id="txtGroup" placeholder="Enter Group Name*" name="gname">
                    </div>                
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" id="btnSubmitGroup" name="addGroup" value="Submit">
                    <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
-->


<div class="modal fade" id="modalEditGroups" role="dialog">
    <div class="modal-dialog modal-md">
        <form id="form-user">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    <h4 class="modal-title">Edit Group</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p id='group-id' hidden></p>
                        <p class='gr-error-message'></p>
                        <div class='row'>
                            <div class='col-md-6'>
                                <input type="text" class="form-control" id="txtGroupName" placeholder="Enter Group Name*">
                            </div>
                            <div class='col-md-4'>
                                <button type="button" class="btn btn-success" id="btnUpdateGroupName">Update</button>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-md-6'>
                                <select class='form-control selectAdviser'>
                                    <option value=''>--------------- Select Adviser -----------------</option>
                                </select>
                            </div>
                            <div class='col-md-4'>
                                <button type="button" class="btn btn-primary btnSelectAdviser">Select Adviser</button>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <select class='form-control selectStudent'>
                                <option value=''>--------------- Select Student -----------------</option>
                            </select>
                        </div>

                        <div class='col-md-3'>
                            <button type='button' class='btn btn-primary form-control addToMembers'>Add to members</button>
                        </div>
                        <div class='col-md-12'>
                            <hr>
                            <label>Adviser</label>
                            <ul class="list-group adviserList">
                            </ul>
                        </div>
                        <div class='col-md-12'>
                            <label>Members <span id='member-count'>(0)<span></label>
                            <ul class="list-group membersList">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="btnGroupClose">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>