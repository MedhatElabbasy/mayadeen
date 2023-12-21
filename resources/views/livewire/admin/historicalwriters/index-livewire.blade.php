<div>
    {{-- Start --}}
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
        <div class="p-3">
            <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                data-bs-target="#historicalWriterModal"><i class="fas fa-plus"></i>
                اضافة كاتب تاريخي
            </button>
        </div>
    </div>

    <div class="row">
        @forelse ($HistoricalWriter as $HistoricalWriter)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <span class="badge badge-primary rounded-pill">{{ $HistoricalWriter->id }}</span>
                        <h3 class="card-title mb-0 pb-0 text-center">{{ $HistoricalWriter->writer_name }}</h3>
                    </div>

                    <div class="card-body">
                        <strong class="label">نبذة عن الكاتب:</strong>
                        {{ $HistoricalWriter->About_writer }}
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-center">
                         
                           <a href="  {{ route('admin.dashboard.show-HistoricalWriter', $HistoricalWriter->id) }}">
                            <span class="icon col-4 text-center hover"><i class="fas fa-eye fa-lg"></i></span>
                            </a> 

                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#updateHistoricalWriterModal"
                                wire:click="editHistoricalWriter({{ $HistoricalWriter->id }})">
                                <i class="las la-pen"></i>
                            </a>

                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteHistoricalWriterModal"
                               // wire:click="deleteHistoricalWriter({{ $HistoricalWriter->id }})">
                                <span class="icon col-4 text-center hover text-danger"><i
                                        class="fas fa-trash-alt fa-lg"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-success" role="alert">
                <p>لايوجد كتّاب تاريخيين متاحين حاليًا</p>
            </div>
        @endforelse
    </div>
{{--     <div class="text-center p-2">
        {{ $HistoricalWriter->links('dashboard.layouts.pagination') }}
    </div> --}}

    {{-- Insert Modal --}}
    <div wire:ignore.self class="modal fade" id="historicalWriterModal" tabindex="-1"
        aria-labelledby="historicalWriterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> إضافة كاتب تاريخي </h6>
                    <button wire:click="closeModal" aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" wire:submit.prevent="saveHistoricalWriter">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label> اسم الكاتب</label>
                            <input type="text" wire:model="writer_name" class="form-control">
                            @error('writer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label> صورة الكاتب </label>
                            <input type="file" wire:model="writer_img" class="form-control">
                            @error('writer_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 

                        <div class="mb-3">
                            <label> نبذة عن الكاتب </label>
                            <textarea wire:model="About_writer" class="form-control" rows="5"></textarea>
                            @error('About_writer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="saveHistoricalWriter"data-bs-dismiss="modal">حفظ</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div wire:ignore.self class="modal fade" id="updateHistoricalWriterModal" tabindex="-1"
        aria-labelledby="updateHistoricalWriterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> تعديل كاتب تاريخي </h6>
                    <button wire:click="closeModal" aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="updateHistoricalWriter">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label> اسم الكاتب</label>
                            <input type="text" wire:model="writer_name" class="form-control">
                            @error('writer_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label> صورة الكاتب </label>
                            <input type="file" wire:model="writer_img" class="form-control">
                            @error('writer_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        
                        </div>
                        <div class="mb-3">
                            <label> نبذة عن الكاتب </label>
                            <textarea wire:model="About_writer" class="form-control" rows="5"></textarea>
                            @error('About_writer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="updateHistoricalWriter">حفظ</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
 {{--     <div wire:ignore.self class="modal fade" id="deleteHistoricalWriterModal" tabindex="-1"
        aria-labelledby="deleteHistoricalWriterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">حذف كاتب تاريخي </h6>
                    <button wire:click="closeModal" aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteHistoricalWriter">
                    <div class="modal-body">
                        <h4>هل انت متأكد من عملية الحذف</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">! حذف</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

  {{--   <div wire:ignore.self class="modal fade" id="deleteHistoricalWriterModal" tabindex="-1"
    aria-labelledby="deleteHistoricalWriterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">حذف كاتب تاريخي </h6>
                <button wire:click="closeModal" aria-label="Close" class="close" data-bs-dismiss="modal"
                    type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form wire:submit.prevent="deleteHistoricalWriter">
                <div class="modal-body">
                    <h4>هل انت متأكد من عملية الحذف؟</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="deleteHistoricalWriter({{ $HistoricalWriter->id  }})">
                        حذف
                    </button>
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">
                        الغاء
                    </button>
                </div>
            </form> 
        </div>
    </div>
</div>
 --}}
    
    {{-- End --}}
</div>
</div>
