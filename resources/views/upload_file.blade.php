@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <a class="btn btn-warning float-right" href="{{route('filter_form')}}" role="button">Filter Data</a>
                    <form method="post" action="{{route('process')}}" enctype="multipart/form-data" class="p-2" id="formUpload">
                        @csrf
                        <div class="form-group">
                          <label for="file">File Upload</label>
                          <input type="file" class="form-control" name="upload_file" id="upload-file" accept=".csv">
                        </div>
                        @if ($errors->has('upload_file'))
                            <span class="text-danger">{{ $errors->first('upload_file') }}</span>
                        @endif

                        <input type="submit"  value="Upload" class="btn btn-primary" name="upload" id="upload-button">

                      </form>

                      <div class="form-group">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
    // $(function () {
    //     $(document).ready(function () {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         $('#formUpload').ajaxForm({
    //             beforeSend: function () {
    //                 var percentage = '0';
    //             },
    //             uploadProgress: function (event, position, total, percentComplete) {
    //                 var percentage = percentComplete;
    //                 $('.progress .progress-bar').css("width", percentage+'%', function() {
    //                     return $(this).attr("aria-valuenow", percentage) + "%";
    //                 })
    //             },
    //             complete: function (xhr) {
    //                 console.log('File has uploaded');
    //             }
    //         });
    //     });
    // });

</script>


