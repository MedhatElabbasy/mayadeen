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
@section('title','ادباء عبر التاريخ')
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">الفعاليات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أدباء عبرالتاريخ</span></div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


<div class="row">
        <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
            <div class="card card-primary">
                <div class="card-header pb-0">
                    <span class="badge badge-primary rounded-pill">{{ $HistoricalWriter->id }}</span>
                    <h3 class="card-title mb-0 pb-0 text-center">{{ $HistoricalWriter->title }}</h3>
                </div>

             
                <div class="card-body">
                  <strong class="label">اسم الشاعر:</strong>
                  {{ $HistoricalWriter->writer_name }}
              </div>
              <div class="card-body">
                  <strong class="label">اسم القصيده:</strong>
                  {{ $HistoricalWriter->Name_poem }}
              </div>
              <div class="card-body">
                  <strong class="label">القصيده :</strong>
                  <audio controls class="mt-3">
                      <source src="{{ asset($HistoricalWriter->audio_file) }}" type="audio/mp3">
                      {{$HistoricalWriter->audio_file}}
                  </audio>
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
