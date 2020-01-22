@set('user',$model->user()->first())
@set('properties',$model->properties()->get()->pluck('value','type')->toArray())
<div class="col s3 card panel">
    <div class="fixed--bar lead-overview_info">
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
                                {{ Form::text('first_name',$model->first_name) }}
                                <label class="">First Name</label>
                            </div>
                            <div class="input-field">
                                {{ Form::text('last_name',$model->last_name) }}
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
            <a href="#search" class="btn btn-small cyan modal-trigger">
                <i class="material-icons">search</i>Add Search
            </a>
            <div id="search" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <div class="modal-header">
                      <span>Add Search</span><a href="#!" class="modal-action modal-close right "><i class="material-icons">clear</i></a>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col s6">
                          <div class="input-field">
                            <input type="text">
                            <label >Search Name:</label>
                          </div>
                        </div>
                        <div class="col s6">
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Notifications</option>
                              <option value="1">Daily</option>
                              <option value="2">Monthly</option>
                              <option value="3">Yearly</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s3">
                          <p>Residential</p>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>All Residential</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Single Family Res</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Ranch</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Split Entry</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Log</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Ton Home</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Multi-Level</span>
                            </label>
                          </div>
                          <p>Condominiums</p>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>All Condominiums</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Apartment</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Ranch-Traditional</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Patio</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Townhouse</span>
                            </label>
                          </div>
                          <p>Multi-Family</p>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>All Multi-Family</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Duplex</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Tri-Plex</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Four-Plex</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>5+ Units</span>
                            </label>
                          </div>
                        </div>
                        <div class="col s3">
                          <p>Price(min-max)</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Min</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Max</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Beds(min-max)</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Min</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Max</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Bathrooms(min-max)</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Min</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Max</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">City</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Zip</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Property Status</p>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Select All</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Properties for Sale</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Sold</span>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Pending</span>
                            </label>
                          </div>
                         <p class="mt-10">Pictures</p>
                          <div>
                            <label>
                              <input type="checkbox" />
                              <span>Only show properties with photos</span>
                            </label>
                          </div>
                        </div>
                        <div class="col s3">
                          <p>Acres(min-max)</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Min</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Max</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Square Feet(min-max)</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Min</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Max</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Year Built(min-max)</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Min</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Max</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Garage</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Grid</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Style</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Amenities</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Basement</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                        </div>
                        <div class="col s3">
                          <p class="mt-10">Interior</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Exterior</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Construction</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Construction Status</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Elementary School</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">Middle School</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                          <p class="mt-10">High School</p>
                          <div class="input-field">
                            <select>
                              <option value="" disabled selected>Select options</option>
                              <option value="1">$2500</option>
                              <option value="2">$3000</option>
                              <option value="3">$4000</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 right-align">
                          <a href="#search" class="btn theme-btn">
                                  Save
                                </a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
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
            @include('real-estate::admin.leads.partials.info.default',['type' => 'email','input_type' => 'email'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'phone','input_type' => 'text'])
            @include('real-estate::admin.leads.partials.info.default',['type' => 'address','input_type' => 'text'])
            @include('real-estate::admin.leads.partials.info.price')
        </div>
    </div>
</div>
