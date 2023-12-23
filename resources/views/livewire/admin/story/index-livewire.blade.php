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

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif





    <div class="row">

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-xm-6">
                <div class="p-3">
                    <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#storyModal"><i class="fas fa-plus "></i>
                        اضافة اقصوصة
                    </button>
                    {{-- <input type="search" wire:model="search" class="form-control float-end mx-2"
                        placeholder="Search...Name" style="width: 300px" /> --}}
                </div>

            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-xm-6">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">عدد الأقصوصات </h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Story::count() }}</h4>
                                    {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i class="fas fa-arrow-circle-up text-white"></i>
                                    {{-- <span class="text-white op-7"> +427</span> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($stories as $story)
                <div class="col-12 col-sm-6 col-lg-3 col-xl-3">
                <div class="card card-primary">
                    <div class="card-header pb-0">
                        <span class="badge badge-primary rounded-pill">{{ $story->id }}</span>
                        <h3 class="card-title mb-0 pb-0 text-center">{{ $story->title }}</h3>
                    </div>

                    <div class="card-body">
                        <strong class="label">الوصف:</strong>
                        {{ $story->description }}
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <strong class="label">المحتوى:</strong>
                            {{ $story->content }}
                            <a href="#" class="card-link" onclick="toggleDescription()"></a>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-center">


                            <a href="{{ route('admin.dashboard.story-download-pdf', $story->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-download"></i> تحميل  PDF
                            </a>


                            <a href="{{ route('admin.dashboard.show-story',$story->id) }}">
                                <span  class="icon col-4 text-center hover"><i
                                    class="fas fa-eye fa-lg"></i></span></a>



                            {{-- <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#updateStoryModal" wire:click="editStory({{ $story->id }})">
                                <i class="las la-pen"></i>
                            </a> --}}

                            {{-- <a href="" data-bs-toggle="modal" data-bs-target="#deleteStoryModal"  wire:click="getDeleteStory({{ $story->id }})">
                                <span class="icon col-4 text-center hover   text-danger"><i
                                        class="fas fa-trash-alt fa-lg"></i></span>
                            </a> --}}

                            <a href="{{ route('admin.dashboard.send-email-form',$story) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-envelope"></i> إرسال
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-success" role="alert">
                <p>لايوجد اقصوصات متاحة حاليآ</p>
            </div>
        @endforelse
    </div>
    <div class="text-center p-2">
        {{ $stories->links('dashboard.layouts.pagination') }}
    </div>
    {{-- insert model --}}
    <div wire:ignore.self class="modal fade" id="storyModal" tabindex="-1" aria-labelledby="storyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> انشاء اقصوصة </h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="saveStory">
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
                        <button type="submit" class="btn btn-primary" wire:click="saveStory">حفظ</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end insert model --}}
    {{-- update  model --}}
    <div wire:ignore.self class="modal fade" id="updateStoryModal" tabindex="-1" aria-labelledby="updateStoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"> تعديل اقصوصة </h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="updateStory">
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
                        <button type="submit" class="btn btn-primary" wire:click="updateStory">حفظ</button>
                        <button type="button" class="btn btn-danger" wire:click="closeModal"
                            data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end  update  model --}}

    {{-- delete model --}}
    <div wire:ignore.self class="modal fade" id="deleteStoryModal" tabindex="-1"
        aria-labelledby="deleteStoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الأقصوصة </h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="deleteStory">
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
