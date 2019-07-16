@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>EDIT DATA</h3>
                  <form action="{{ route('home') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>

                      @endif


                      @if ($message = Session::get('success'))

                      <div class="alert alert-success alert-block">

                          <button type="button" class="close" data-dismiss="alert">×</button>

                              <strong>{{ $message }}</strong>

                      </div>

                      @endif

                      <div class="row">

                      <div class='list-group gallery'>


                        @if($data->count())

                            @foreach($data as $d)

                            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                                <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $d->image }}">

                                    <img class="img-responsive" alt="" src="/images/{{ $d->image }}" />

                                    <div class='text-center'>

                                        <small class='text-muted'>{{ $d->nama }}</small>
                                    </div> <!-- text-center / end -->


                                </a>


                                <form action="{{ url('imgdelete',$d->id) }}" method="POST">

                                <input type="hidden" name="_method" value="delete">

                                {!! csrf_field() !!}


                                <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>

                                </form>

                            </div> <!-- col-6 / end -->

                            @endforeach

                        @endif


                          </div> <!-- list-group / end -->



                      <div class="row">

                          <div class="col-md-5">

                              <strong>Nama:</strong>

                              <input type="text" name="nama" class="form-control" placeholder="{{$d->nama}}">

                          </div>

                          <div class="col-md-5">

                              <strong>Jenis:</strong>

                              <input type="text" name="jenis" class="form-control" placeholder="{{$d->jenis}}">

                          </div>

                          <div class="col-md-5">

                              <strong>Pemilik:</strong>

                              <input type="text" name="pemilik" class="form-control" placeholder="{{$d->pemilik}}">

                          </div>

                          <div class="col-md-5">

                              <strong>Image:</strong>

                              <input type="file" name="image" class="form-control" placeholder="{{$d->image}}">

                          </div>

                          <div class="col-md-2">

                              <br/>

                              <button type="submit" class="btn btn-success">Upload</button>

                          </div>

                      </div>


                  </form>



                  </div> <!-- row / end -->

                  </div> <!-- container / end -->


                  </body>


                  <script type="text/javascript">

                  $(document).ready(function(){

                      $(".fancybox").fancybox({

                          openEffect: "none",

                          closeEffect: "none"

                      });

                  });

                  </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
