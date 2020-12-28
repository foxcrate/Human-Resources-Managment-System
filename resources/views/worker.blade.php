<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="../css/style.css" /> 

    <style>
            body {
        overflow-x: hidden;
        }

        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
        width: 15rem;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }

        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
    </style>

    <title>Human Resource Managment System</title>
  </head>
  @include("nav")
  <body dir="rtl">
    <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
      @include("sidebar")
    </div>

      <div id="page-content-wrapper">

        @if($layout=="index")
            <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-11">
                  @include("workersList")
                </section>
              </div>
            </div>

        @elseif($layout=="users")
        <div class="container-fluid mt-4">
          <div class="row justify-content-center">
            <section class="col-md-11">
              @include("usersList")
            </section>
          </div>
        </div>

        @elseif($layout=="addRoleToUser")
          <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-7">
                  @include("usersList")
                </section>
                <section class="col-md-5">
                  @include("addRoleToUser")
                </section>
              </div>
          </div> 

        @elseif($layout=="addFunctionToPermission")
          <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-7">
                  @include("newAccess")
                </section>
                <section class="col-md-5">
                  @include("addFunctionToPermission")
                </section>
              </div>
          </div> 

        @elseif($layout=="roles")
          <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-11">
                  @include("roles")
                </section>
              </div>
          </div>

        @elseif($layout=="rolesDetails")
            <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-7">
                  @include("roles")
                </section>
                <section class="col-md-5">
                  @include("rolesDetails")
                </section>
              </div>
            </div>

          @elseif($layout=="addRolePermission")
            <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-7">
                  @include("roles")
                </section>
                <section class="col-md-5">
                  @include("roleAddPermission")
                </section>
              </div>
            </div>        

        @elseif($layout=="newAccess")
          <div class="container-fluid mt-4">
            <div class="row justify-content-center">
              <section class="col-md-11">
                @include("newAccess")
              </section>
            </div>
        </div>

        @elseif($layout=="newAccessDetails")
          <div class="container-fluid mt-4">
            <div class="row justify-content-center">
              <section class="col-md-7">
                @include("newAccess")
              </section>
              <section class="col-md-5">
                @include("newAccessDetails")
              </section>
            </div>
          </div>

        @elseif($layout=="addNewRole")
          <div class="container-fluid mt-4">
            <div class="row justify-content-center">
              <section class="col-md-7">
                @include("roles")
              </section>
              <section class="col-md-5">
                @include("addNewRole")
              </section>
            </div>
          </div>

        @elseif($layout=="addNewAccess")
          <div class="container-fluid mt-4">
            <div class="row justify-content-center">
              <section class="col-md-7">
                @include("addNewAccess")
              </section>
              <section class="col-md-5">
                @include("newAccessDetails")
              </section>
            </div>
          </div>

        @elseif($layout=="dashboard")
          <div class="container-fluid mt-4">
            <div class="row">

              <div class="col-3 col-m-6 col-sm-6">
                  <div class="counter bg-primary">
                      <p>
                          <i class="fas fa-tasks"></i>
                      </p>
                      <h3>{{count($workers)}}</h3>
                      <p>موظف</p>
                  </div>
              </div>

              <div class="col-3 col-m-6 col-sm-6">
                  <div class="counter bg-warning">
                      <p>
                          <i class="fas fa-spinner"></i>
                      </p>
                      <h3>100+</h3>
                      <p>In progress</p>
                  </div>
              </div>

              <div class="col-3 col-m-6 col-sm-6">
                  <div class="counter bg-success">
                      <p>
                          <i class="fas fa-check-circle"></i>
                      </p>
                      <h3>100+</h3>
                      <p>Completed</p>
                  </div>
              </div>

              <div class="col-3 col-m-6 col-sm-6">
                  <div class="counter bg-danger">
                      <p>
                          <i class="fas fa-bug"></i>
                      </p>
                      <h3>100+</h3>
                      <p>Issues</p>
                  </div>
              </div>

            </div>
          </div>

        @elseif($layout=="indexcs")
            <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-11">
                  @include("workersList")
                </section>
              </div>
            </div>

        @elseif($layout=="indexit")
            <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-11">
                  @include("workersList")
                </section>
              </div>
            </div>

        @elseif($layout=="indexhr")
            <div class="container-fluid mt-4">
              <div class="row justify-content-center">
                <section class="col-md-11">
                  @include("workersList")
                </section>
              </div>
            </div>

        @elseif($layout=="show")
            <div class="container-fluid mt-4 " id="show-form">
              <div class="row">
                <section class="col-md-7">
                  @include("workersList")
                </section>
                <section class="col-md-5">
                    <div class="card p-1">
                      <h5 class="card-title">Details Of The Worker</h5>
                      
                      <div class="container-fluid  " id="show-form2">
                        <div class='row'>
                          <div class="col-md-6"> 
                            <p>This will be the left side</p>
                            <p> First Row</p>
                            <p > Third Row</p>
                            <p > Fourth Row</p>
                          </div>
                          <div class="col-md-6"> 
                            <p>This will be the right side</p>
                          </div>
                        </div>
                      </div>
                        
                    </div>
                </section>
              </div>
            </div>

        @elseif($layout=="edit")
            <div class="container-fluid mt-4">
              <div class="row">
                <section class="col-md-7">
                  @include("workersList")
                </section>

                <section class="col-md-5">
                @include("edit")
                </section>

              </div>
            </div>

        @elseif($layout=="showAccess")
        <div class="container-fluid mt-4">
          <div class="row justify-content-center">
            <section class="col-md-11">
              @include("access")
            </section>
          </div>
        </div>

        @endif

      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>