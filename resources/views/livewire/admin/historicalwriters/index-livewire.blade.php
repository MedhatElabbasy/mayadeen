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
                data-bs-target="#HistoricalWriterModal"><i class="fas fa-plus "></i>
              اضافة الشعر
            </button>
            {{-- <input type="search" wire:model="search" class="form-control float-end mx-2"
                placeholder="Search...Name" style="width: 300px" /> --}}
        </div>
    </div>
</div>


<div class="row">
    @forelse ($HistoricalWriter as $HistoricalWriter)
        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
            <div class="card card-primary">
                <div class="card-header pb-0">
                    <span class="badge badge-primary rounded-pill">{{ $HistoricalWriter->id }}</span>
                    <h3 class="card-title mb-0 pb-0 text-center">{{ $HistoricalWriter->event_name }}</h3>
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

                <div class="card-footer">
                    <div class="row justify-content-center">
{{--                        <a href="{{ route('admin.dashboard.show-HistoricalWriter',$HistoricalWriter->id) }}">
 --}}                           <span  class="icon col-4 text-center hover"><i
                                class="fas fa-eye fa-lg"></i></span></a>



                                <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#updateHistoricalWriterModal" wire:click="editHistoricalWriter({{$HistoricalWriter->id }})">
                                <i class="las la-pen"></i>
                            </a>

                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteHistoricalWriterModal"  wire:click="getdeleteHistoricalWriter({{ $HistoricalWriter->id }})">
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


 {{-- insert model --}}
 <div wire:ignore.self class="modal fade" id="HistoricalWriterModal" tabindex="-1" aria-labelledby="HistoricalWriterModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h6 class="modal-title"> اضافة قصيدة </h6><button wire:click="closeModal" aria-label="Close"
                 class="close" data-bs-dismiss="modal" type="button"><span
                     aria-hidden="true">&times;</span></button>
         </div>
         <form wire:submit.prevent="saveHistoricalWriter">
            <div class="modal-body">
                <div class="mb-3">
                    <label> اسم الفاعليه</label>
                    <input type="text" wire:model="event_name" class="form-control">
                    @error('event_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>اسم الشاعر </label>
                    <textarea wire:model="writer_name" class="form-control" rows="2"></textarea>
                    @error('writer_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>اسم القصيده </label>
                    <textarea wire:model="Name_poem" class="form-control" rows="2"></textarea>
                    @error('Name_poem')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="audio_file">القصيدة</label>
                    <input type="file" id="audio_file" wire:model="audio_file" class="form-control">
                    @error('audio_file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

             
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" wire:click="saveHistoricalWriter">حفظ</button>
                <button type="button" class="btn btn-danger" wire:click="closeModal"
                    data-bs-dismiss="modal">الغاء</button>
            </div>
        </form>
    </div>
</div>
</div>

{{-- end insert model --}}

{{-- update  model --}}
<div wire:ignore.self class="modal fade" id="updateHistoricalWriterModal" tabindex="-1" aria-labelledby="HistoricalWriterModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title"> تعديل القصيده </h6><button wire:click="closeModal" aria-label="Close"
                class="close" data-bs-dismiss="modal" type="button"><span
                    aria-hidden="true">&times;</span></button>
        </div>
        <form wire:submit.prevent="updateHistoricalWriter">
            <div class="modal-body">
                <div class="mb-3">
                    <label> اسم الفاعليه</label>
                    <input type="text" wire:model="event_name" class="form-control">
                    @error('event_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>اسم الشاعر </label>
                    <input type="text" wire:model="writer_name" class="form-control">
                    @error('writer_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>اسم القصيدة </label>
                    <input type="text" wire:model="Name_poem" class="form-control">
                    @error('Name_poem')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="audio_file">القصيدة</label>
                    <input type="file" id="audio_file" wire:model="audio_file" class="form-control">
                    @error('audio_file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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

  <div wire:ignore.self class="modal fade" id="deleteHistoricalWriter" tabindex="-1"
    aria-labelledby="deleteHistoricalWriter" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">حذف القصيدة </h6><button wire:click="closeModal" aria-label="Close"
                    class="close" data-bs-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form wire:submit.prevent="deleteHistoricalWriter">
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


</div>



{{-- end insert model --}}