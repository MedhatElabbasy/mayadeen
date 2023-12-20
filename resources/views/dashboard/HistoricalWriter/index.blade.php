@extends('dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/morris.js/morris.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

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
  </style>
@endsection
@section('title','أدباء عبر التاريخ')
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">الفعاليات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أدباء عبر التاريخ</span></div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@livewire('admin.historicalwriters.index-livewire')


            </div>
        </div>
@endsection
@section('js')
<script>
    function toggleDescription() {
      var description = document.querySelector('.card-text');
      description.style.webkitLineClamp = description.style.webkitLineClamp === '2' ? 'unset' : '2';
    }
  </script>


<script>
    window.addEventListener('close-modal', event => {

      $('#HistoricalWriterModal').modal('hide');
        $('#updateHistoricalWriterModal').modal('hide');
        $('#deleteHistoricalWriterModal').modal('hide');
    })
</script>
@endsection
