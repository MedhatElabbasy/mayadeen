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
                    data-bs-target="#storyModal"><i class="fas fa-plus "></i>
                    اضافة اقصوصة
                </button>
                {{-- <input type="search" wire:model="search" class="form-control float-end mx-2"
                    placeholder="Search...Name" style="width: 300px" /> --}}
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($stories as $story)
            <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
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
                            <a href="#" class="card-link" onclick="toggleDescription()">عرض المزيد</a>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <span wire:click="showStory({{ $story->id }})" class="icon col-4 text-center hover"><i
                                    class="fas fa-eye fa-lg"></i></span>
                            {{-- <span wire:click="editStory({{ $story->id }})" class="icon col-4 text-center hover"><i
                                    class="fas fa-edit fa-lg"></i></span> --}}

                            <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#updateCatModal" wire:click="editCat({{ $story->id }})">
                                <i class="las la-pen"></i>
                            </a>

                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteCatModal">
                                <span class="icon col-4 text-center hover   text-danger"><i
                                        class="fas fa-trash-alt fa-lg"></i></span>
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


    {{-- end  update  model --}}

    {{-- delete model --}}
    <div wire:ignore.self class="modal fade" id="deleteCatModal" tabindex="-1" aria-labelledby="deleteMcatModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Category</h6><button wire:click="closeModal" aria-label="Close"
                        class="close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form wire:submit.prevent="destroyCat">
                    <div class="modal-body">
                        <h4>?Are you sure you want to delete this data </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes! Delete</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeModal"
                            data-bs-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end delete model --}}


    {{-- end --}}
</div>
