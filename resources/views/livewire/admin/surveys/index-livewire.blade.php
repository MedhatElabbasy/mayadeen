<div>
    {{-- start --}}
    <div class="container mt-3">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        {{ session('message') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered mb-2">
                <thead class="thead-dark text-center">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">الإسم</th>
                        <th class="text-center">البريد الإلكتروني</th>
                        <th class="text-center">الجوال</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @forelse ($surveys as $survey)
                    <tr id="row_{{$survey->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{ $survey->name }}
                        </td>
                        <td>
                            {{ $survey->email }}
                        </td>
                        <td>
                            {{ $survey->phone }}
                        </td>
                        <td>

                            <a href="javascript:;" data-bs-target="#editsurvey{{$survey->id}}" data-bs-toggle="modal" class="btn btn-sm btn-info"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="عرض التقييمات">
                                 <i class="fa fa-eye"></i>
                            </a>
                           
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center ">
                           <p>لايوجد إستبيانات متاحة حاليآ</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @foreach($surveys as $survey)
        @include('dashboard.surveys.show')
    @endforeach
    <div class="text-center p-2">
        {{ $surveys->links('dashboard.layouts.pagination') }}
    </div>


    {{-- end --}}
</div>
