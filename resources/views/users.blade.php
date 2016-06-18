@extends('admin')

@section('content')

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="tabla-usuarios">
                                    <thead>
                                    <tr>
                                        <th>Rol</th>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit user</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="edit-form">
                                        <div class="form-group">
                                            <label for="act">Do you want to active this user?</label>
                                            <input type="checkbox" name="active-checkbox" id="act">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr">Username:</label>
                                            <input type="text" class="form-control" id="usr">
                                            <span id="error-name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="nme">Name:</label>
                                            <input type="text" class="form-control" id="nme">
                                        </div>
                                        <div class="form-group">
                                            <label for="srnme">Surname:</label>
                                            <input type="text" class="form-control" id="srnme">
                                        </div>
                                        <div class="form-group">
                                            <label for="mail">Email:</label>
                                            <input type="text" class="form-control" id="mail">
                                            <span id="error-email"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone number:</label>
                                            <input type="text" class="form-control" id="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="rol">Select rol:</label>
                                            <select class="form-control" id="rol">
                                                <option name="user" value="0">User</option>
                                                <option name="admin" value="1">Admin</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button id="edit-button" type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete user</h4>
                                </div>
                                <div class="modal-body">
                                    <p></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="delete-button" type="button" class="btn btn-primary">Delete</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>

    <script src="{{asset("js/admin-users.js")}}"></script>
@endsection
