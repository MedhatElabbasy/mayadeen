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

        <div class="row">
            <div class="p-3">
                <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#writerModal"><i class="fas fa-plus "></i>
                    اضافة قصيدة
                </button>
                {{-- <input type="search" wire:model="search" class="form-control float-end mx-2"
                    placeholder="Search...Name" style="width: 300px" /> --}}
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($writers as $writer)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <span class="badge badge-primary rounded-pill">{{ $writer->id }}</span>
                        <h3 class="card-title mb-0 pb-0 text-center">{{ $writer->title }}</h3>
                    </div>
                    <div class="card-body">
                        <strong class="label">اسم الكاتب :</strong>
                        {{ $writer->auther_name }}
                    </div>
                    <div class="card-body">
                        <strong class="label">عن الكاتب:</strong>
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
                            <a href="#" class="card-link" onclick="toggleDescription()">عرض المزيد</a>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <a href="{{ route('admin.dashboard.show-writer',$writer->id) }}">
                                <span  class="icon col-4 text-center hover"><i
                                    class="fas fa-eye fa-lg"></i></span></a>



                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#updateWriterModal" wire:click="editWriter({{ $writer->id }})">
                                <i class="las la-pen"></i>
                            </a>

                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteWriterModal"  wire:click="getDeleteWriter({{ $writer->id }})">
                                <span class="icon col-4 text-center hover   text-danger"><i
                                        class="fas fa-trash-alt fa-lg"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-success" role="alert">
                <p>لايوجد قصائد متاحة حاليآ</p>
            </div>
        @endforelse
    </div>
    <div class="text-center p-2">
        {{ $writers->links('dashboard.layouts.pagination') }}
    </div>
    {{-- insert model --}}
    <div wire:ignore.self class="modal fade" id="writerModal" tabindex="-1" aria-labelledby="writerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> انشاء قصيدة </h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="saveWriter">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label> اسم الكاتب</label>
                            <input type="text" wire:model="auther_name" class="form-control">
                            @error('auther_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label> معلومات عن الكاتب</label>
                            <textarea wire:model="about_auther" class="form-control" rows="2"></textarea>
                            @error('about_auther')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label> العنوان</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>الوصف </label>
                            <textarea wire:model="description" class="form-control" rows="2"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>المحتوي </label>
                            <textarea wire:model="content" class="form-control" rows="5"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="saveWriter">حفظ</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end insert model --}}
    {{-- update  model --}}
    <div wire:ignore.self class="modal fade" id="updateWriterModal" tabindex="-1" aria-labelledby="updateWriterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> تعديل اقصوصة </h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="updateWriter">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label> العنوان</label>
                            <input type="text" wire:model="title" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>الوصف </label>
                            <textarea wire:model="description" class="form-control" rows="2"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>المحتوي </label>
                            <textarea wire:model="content" class="form-control" rows="5"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="updateWriter">حفظ</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end  update  model --}}

    {{-- delete model --}}
    <div wire:ignore.self class="modal fade" id="deleteWriterModal" tabindex="-1"
        aria-labelledby="deleteWriterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">حذف القصيدة  </h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="deleteWriter">
                    <div class="modal-body">
                        <h4>هل انت متآكد من عملية الحذف</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">! حذف</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end delete model --}}


    {{-- end --}}
</div>
