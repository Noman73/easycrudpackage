 <!-- Content Wrapper. Contains page content -->
 {{-- @extends('easycrud::views.layouts.master') --}}
 @push('easycrud-link')
 <link rel="stylesheet" href="{{asset('easycrud/assets/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('easycrud/assets/css/responsive.bootstrap4.min.css')}}">
  @php
     $userdata=\Noman\Easycrud\Models\EasycrudForm::where('name',$data['form']['name'])->first();
     $form_name=str_replace('_',' ',$data['form']['name']); 

  @endphp
@endpush
 {{-- @section('easycrud::content')  --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$userdata->label}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$userdata->label}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card ">
            <div class="card-header bg-dark">
              <div class="row">
                <div class="col-6">
                  <div class="card-title">{{$userdata->label}} </div>
                </div>
                <div class="col-6">
                  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modal" data-whatever="@mdo" id="modalBtn">Add New</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-sm text-center table-bordered" id="datatable">
                <thead>
                  <tr>
                    <th>SL</th>
                    @foreach ($data['datatable'] as $th)
                    <th>{{ucwords(str_replace('_',' ',$th))}}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
      </div><!-- /.container-fluid -->
      {{-- modal --}}
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <input type="hidden" id="id">
                <div class="row">
                  @foreach($data['fields'] as $field)
                  <div class="col-md-8 mr-auto ml-auto">
                    {!! Noman\Easycrud\FormMaker::FormMaker($field) !!}
                  </div>
                  @endforeach
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="formRequest()">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{-- endmodal --}}
    </section>
  {{-- @endsection --}}
  @push('easycrud-script')
  <script src="{{asset('easycrud/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('easycrud/assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('easycrud/assets/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('easycrud/assets/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('easycrud/assets/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.0/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('easycrud::views.easycrud.internal-assets.js.script')
  @endpush