@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main-trans.grades') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('grades-trans.add_Grade') }}
            </button>
            <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>{{ trans('grades-trans.Name') }}</th>
                              <th>{{ trans('grades-trans.Notes') }}</th>
                              <th>{{ trans('grades-trans.Processes') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($grades as $grade )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $grade->name }}</td>
                            <td>{{ $grade->notes }}h</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $grade->id }}"
                                title="{{ trans('grades-trans.Edit') }}"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $grade->id }}"
                                title="{{ trans('grades-trans.Delete') }}"><i
                                    class="fa fa-trash"></i></button>
                            </td>
                        </tr>                            
                        @endforeach                          
                      </tbody>
                   </table>
                  </div>
            </div>
        </div>
    </div>

<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ trans('grades-trans.add_Grade') }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- add_form -->
            <form action="{{ route('grades.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="Name" class="mr-sm-2">{{ trans('grades-trans.stage_name_ar') }}
                            :</label>
                        <input id="Name" type="text" name="Name" class="form-control">
                    </div>
                    <div class="col">
                        <label for="Name_en" class="mr-sm-2">{{ trans('grades-trans.stage_name_en') }}
                            :</label>
                        <input type="text" class="form-control" name="Name_en">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{ trans('grades-trans.Notes') }}
                        :</label>
                    <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <br><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">{{ trans('grades-trans.Close') }}</button>
            <button type="submit" class="btn btn-success">{{ trans('grades-trans.submit') }}</button>
        </div>
        </form>

    </div>
</div>
</div>


</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
