<div class="col s3 card panel">
    <div class="fixed--bar">
        <h3 class="title">{{ $model->first_name }} {{ $model->last_name }} <a href="#edit" class="modal-trigger"><i class="material-icons">edit</i></a></h3>
        <div id="edit" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Edit Lead Name</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            <div class="input-field">
                                {{ Form::text('first_name',null) }}
                                <label class="">First Name</label>
                            </div>
                            <div class="input-field">
                                {{ Form::text('last_name',null) }}
                                <label>Last Name</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class=" btn theme-btn">Save</a>
                </div>
            </div>
        </div>
        <div class="bar-btn">
            <a href="#" class="btn btn-small cyan">
                <i class="material-icons">email</i>Send Email
            </a>
            <a href="#" class="btn btn-small cyan">
                <i class="material-icons">search</i>Add Search
            </a>
        </div>
        <div class="row">
            <div class="tags col s12">
                <div class="chip amber">
                    Anchorage
                    <i class="close material-icons">close</i>
                </div>
                <div class="chip purple">
                    Active
                    <i class="close material-icons">close</i>
                </div>
            </div>
            <div class="col s12">
                <select>
                    <option value="" disabled selected>assign group</option>
                    <option value="1">Palmer</option>
                    <option value="2">Sellar</option>
                    <option value="3">Wasilla</option>
                </select>
            </div>
        </div>
        <div class="form-element">
            <div class="row">
                <div class="col s12">
                    <h5>Email
                        <a href="#add" class="modal-trigger">
                            <i class="material-icons right">add</i>
                        </a>
                        <div id="add" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span>
                                    <a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="status right-align">
                                            <a href="#">
                                                <i class="material-icons">help_outline</i>
                                                Unverified
                                            </a>
                                            <a href="#">
                                                <i class="material-icons">clear</i>
                                                Invalid
                                            </a>
                                            <a href="#">
                                                <i class="material-icons">check</i>
                                                Valid
                                            </a>
                                        </div>
                                        <div class="input-field">
                                            <input type="text">
                                            <label>Email</label>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class=" btn theme-btn">Save</a>
                                </div>
                            </div>
                        </div>
                    </h5>
                    <div>
                        <i class="grey material-icons">close</i>info@gmail.com
                        <a href="#" class="right">
                            <i class="material-icons">delete</i>
                        </a>
                        <a href="#email-edit" class="right modal-trigger">
                            <i class="material-icons">edit</i>
                        </a>
                        <div id="email-edit" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span>
                                    <a href="#!" class="modal-action modal-close right ">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div>
                                            <div class=" status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i> Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i> Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i> Valid
                                                </a>
                                            </div>
                                            <div class="input-field">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class=" btn theme-btn">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col s12">
                    <h5>Phone
                        <a href="#add" class="modal-trigger"><i class="material-icons right">add</i></a>
                        <div id="add" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span>
                                    <a href="#!" class="modal-action modal-close right ">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div>
                                            <div class=" status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i>
                                                    Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i>
                                                    Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i>
                                                    Valid
                                                </a>
                                            </div>
                                            <div class="input-field">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class=" btn purple">Save</a>
                                </div>
                            </div>
                        </div>
                    </h5>
                    <div><i class="grey material-icons">close</i>908764322
                        <a href="#" class="right">
                            <i class="material-icons">delete</i>
                        </a>
                        <a href="#email-edit" class="right modal-trigger">
                            <i class="material-icons">edit</i>
                        </a>
                        <div id="email-edit" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col s12 status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i> Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i> Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i> Valid
                                                </a>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                            <div class="col s12">
                                                <a href="#" class=" btn purple">Save</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col s12">
                    <h5>Address
                        <a href="#add" class="modal-trigger"><i class="material-icons right">add</i></a>
                        <div id="add" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col s12 status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i>
                                                    Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i>
                                                    Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i>
                                                    Valid
                                                </a>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                            <div class="col s12">
                                                <a href="#" class=" btn purple">Save</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </h5>
                    <div><i class="grey material-icons">close</i>908764322
                        <a href="#" class="right">
                            <i class="material-icons">delete</i>
                        </a>
                        <a href="#email-edit" class="right modal-trigger">
                            <i class="material-icons">edit</i>
                        </a>
                        <div id="email-edit" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col s12 status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i> Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i> Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i> Valid
                                                </a>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                            <div class="col s12">
                                                <a href="#" class=" btn purple">Save</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col s12">
                    <h5>Price
                        <a href="#add" class="modal-trigger"><i class="material-icons right">add</i></a>
                        <div id="add" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col s12 status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i>
                                                    Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i>
                                                    Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i>
                                                    Valid
                                                </a>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                            <div class="col s12">
                                                <a href="#" class=" btn purple">Save</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </h5>
                    <div><i class="grey material-icons">close</i>908764322
                        <a href="#" class="right">
                            <i class="material-icons">delete</i>
                        </a>
                        <a href="#email-edit" class="right modal-trigger">
                            <i class="material-icons">edit</i>
                        </a>
                        <div id="email-edit" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span>Add Email</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col s12 status right-align">
                                                <a href="#">
                                                    <i class="material-icons">help_outline</i> Unverified
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">clear</i> Invalid
                                                </a>
                                                <a href="#">
                                                    <i class="material-icons">check</i> Valid
                                                </a>
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="text">
                                                <label>Email</label>
                                            </div>
                                            <div class="col s12">
                                                <a href="#" class=" btn purple">Save</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mt-7">
                        <p>MEDIAN PRICE:</p>
                        <p>AVERAGE PRICE:</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>