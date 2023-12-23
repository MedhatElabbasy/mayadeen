@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
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
@section('title', 'الأقصوصة')
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفعاليات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    أقصوصة</span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                        ارسال عبر البريد</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="container">
        <h1>ارسال {{ $story->title }} الي البريد الالكتروني </h1>
        <form action=" {{ route('admin.dashboard.send-email',$story) }}  " method="post">
            @csrf
            <div class="form-group">
                <label> ارسال الي  </label><br>
                <label>
                    <input type="checkbox" name="recipients[]" value=" {{ $supervisor->email }}">  {{ $supervisor->name }}
                </label><br>
                <label>
                    <input type="checkbox" name="recipients[]" value=" {{ $story->w1_email }}">  {{ $story->w1_name }}
                </label><br>
                <label>
                    <input type="checkbox" name="recipients[]" value=" {{ $story->w2_email }}">     {{ $story->w2_name }}
                </label><br>
                <label>
                    <input type="checkbox" name="recipients[]" value=" {{ $story->w3_email }}">  {{ $story->w3_name }}
                </label>
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary"> ارسال عبر البريد  </button>
        </form>
    </div>
</div>
</div>
@endsection



 @section('js')

@endsection
