<div class="modal fade text-md-start" id="editsurvey{{$survey->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">عرض التقييمات</h1>
                </div>
                <div class="questions-container">
                    <ul>
                        <li>
                            <span>ما مدى رضاك عن مرافق المهرجان ؟</span>
                            <div class="imgs-container">
                                <div class="img-container">
                                    <img src="{{ $survey->surveyText($survey->facilities)['img'] }}" alt=""
                                        style="width: 30px;" />

                                    <span class="very_suf">
                                        {{ $survey->surveyText($survey->facilities)['text'] }}
                                    </span>

                                </div>
                            </div>
                        </li>
                        <li>
                            <span>ما مدى رضاك عن تنظيم الفعالية ؟ </span>
                           <div class="imgs-container">
                            <div class="img-container">
                                <img src="{{ $survey->surveyText($survey->organization)['img'] }}" alt="" style="width: 30px;" />

                                <span class="very_suf">
                                    {{ $survey->surveyText($survey->organization)['text'] }}
                                </span>

                            </div>
                        </div>
                        </li>
                        <li>
                            <span>ما مدى رضاك عن الفعاليات المقامة ؟ </span>
                            <div class="imgs-container">
                                <div class="img-container">
                                    <img src="{{ $survey->surveyText($survey->events)['img'] }}" alt="" style="width: 30px;" />

                                    <span class="very_suf">
                                        {{ $survey->surveyText($survey->events)['text'] }}
                                    </span>

                                </div>
                            </div>
                        </li>
                        <li>
                            <span>ما مدى رضاك عن سهولة الوصول للمهرجان ؟</span>
                            <div class="imgs-container">
                                <div class="img-container">
                                    <img src="{{ $survey->surveyText($survey->access)['img'] }}" alt="" style="width: 30px;" />

                                    <span class="very_suf">
                                        {{ $survey->surveyText($survey->access)['text'] }}
                                    </span>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
