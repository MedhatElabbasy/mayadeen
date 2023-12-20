@extends('dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
{{--
<style>
    .card-text {
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 2; /* Number of lines to show */
      -webkit-box-orient: vertical;
    }

  .label {
    color: #9685f7; /* Choose your desired color */
    font-size: 1rem; /* Choose your desired font size */
    font-weight: bold; /* Make the text bold */
    margin-right: 5px; /* Add some right margin for spacing */
  }

  .labe2 {
    color: #9685f7; /* Choose your desired color */
    font-size: 1rem; /* Choose your desired font size */
    font-weight: bold; /* Make the text bold */
    margin-right: 5px; /* Add some right margin for spacing */
  }


  .icon:hover {
    cursor: pointer;
    color: #007bff; /* Change the color to your desired hover color */
}
  </style> --}}
@endsection
@section('title','القصيدة')
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">الفعاليات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أقصوصة</span></div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


<div class="row">
        <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card card-primary">
                <div class="card-header pb-0">
                    <span class="badge badge-primary rounded-pill">{{ $writer->id }}</span>
                    <h3 class="card-title mb-0 pb-0 text-center">{{ $writer->title }}</h3>
                </div>
                <div class="card-body">
                    <strong class="label">اسم الكاتب:</strong>
                    {{ $writer->auther_name }}
                </div>
                <div class="card-body">
                    <strong class="label">عن الكاتب :</strong>
                    {{ $writer->about_auther }}
                </div>
                <div class="card-body">
                    <strong class="label">الوصف:</strong>
                    {{ $writer->description }}
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <strong class="label">المحتوى:</strong>
                        {{ $writer->content }}

                    </div>
                </div>


            </div>
        </div>

</div>


{{-- //// --}}
            </div>
        </div>
@endsection
@section('js')

@endsection
