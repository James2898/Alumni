          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-danger">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#profile" data-toggle="tab">
                                <i class="material-icons">list</i> Alumni List
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#messages" data-toggle="tab">
                                <i class="material-icons">person_add</i> Add Alumni
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                          </ul>
                      </div>
                    </div>
                          </div><!-- End of Card Header -->
                          <div class="card-body">
                              <div class="tab-content">
                                <div class="tab-pane table-responsive active" id="profile">
                                    <table class="table" id="example">
                                      <thead class="text-danger">
                                        <th>
                                          USN
                                        </th>
                                        <th>
                                          Name
                                        </th>
                                        <th>
                                          Degree Program
                                        </th>
                                        <th>
                                          Year of Graduation
                                        </th>
                                        <th>
                                          Work Status
                                        </th>
                                        <th>
                                          Action
                                        </th>
                                        
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>16004187600</td>
                                          <td>James Emmanuel M. Martinez</td>
                                          <td>BSIT - Network Administration</td>
                                          <td>2019</td>
                                          <td>Active</td>
                                          <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-danger pull-right" role="menu">
                                                        
                                                        <!-- teacher EDITING LINK -->
                                                        <li>
                                                          <a href="#"><i class="material-icons">remove_red_eye</i> View</a>
                                                        </li>
                                                        <li>
                                                          <a href="#"><i class="material-icons">edit</i> Edit</a>
                                                        </li>
                                                        <li>
                                                          <a href="#"><i class="material-icons">delete</i> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                      </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <form>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-static text-danger">Degree Program</label>
                                            <select class="form-control text-muted"> 
                                              <option>Select</option>
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-static text-danger">Major</label>
                                            <select class="form-control text-muted"> 
                                              <option>Select</option>
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Student No.</label>
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Password</label>
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Fist Name</label>
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Middle Name</label>
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Last Name</label>
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Mobile No.</label>
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Landline No.</label>
                                            <input type="email" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                      <!--  -->
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="bmd-label-floating text-danger">Email address</label>
                                            <input type="email" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn btn-danger pull-right">Add Alumni</button>
                                      <div class="clearfix"></div>
                                    </form>
                                </div>
                              </div><!-- End of Tab Content -->
                          </div><!-- End of Card Body -->
                        </div>
                </div>
              </div>
            </div>
          </div>