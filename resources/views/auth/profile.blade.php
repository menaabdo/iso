@extends('layouts.master')
@section ('content')




<br><br><br><br><br>
    <section class="content">
        <div class="card">
<div class="card-body">
            <!-- <div class="row"> -->
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <!-- <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('asset/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
                        </div> -->

                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

               

                        <ul class="list-group list-group-unbordered mb-12">
                            <li class="list-group-item">
                                <b>{{Auth::user()->email}}</b>
                            </li>
                            <!-- <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> -->
                        </ul>
                        <div class="col-md-12" style="text-align:center;">
                            <a class="btn btn-primary" title="Edit" href="{{ route('editProfile', Auth::user()->id) }}">
                                <b>Update</b>
                            </a>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <!-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div> -->
                <!-- /.card-header -->
                <!-- <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div> -->
                <!-- /.card-body -->
                <!-- </div> -->
                <!-- /.card -->
     
            <!-- /.col -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection