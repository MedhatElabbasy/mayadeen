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
                    @forelse ($surveys as $story)
                    <tr id="row_{{$story->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{ $story->name }}
                        </td>
                        <td>
                            {{ $story->email }}
                        </td>
                        <td>
                            {{ $story->phone }}
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <button wire:click="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
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
    <div class="text-center p-2">
        {{ $surveys->links('dashboard.layouts.pagination') }}
    </div>


    {{-- end --}}
</div>
