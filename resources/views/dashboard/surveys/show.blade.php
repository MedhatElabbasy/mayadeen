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
                                    <img src="{{ asset('website/imges/rating/very_suf.svg') }}" alt=""
                                        style="width: 30px;" />

                                    <span class="very_suf">راضي جدا</span>
                                    <input type="radio" name="facilities" value="verySatified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="suf">راضي </span>
                                    <input type="radio" name="facilities" value="satified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/mid.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="mid">محايد </span>
                                    <input type="radio" name="facilities" value="neutral" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="sad"> مستاء</span>
                                    <input type="radio" name="facilities" value="upset" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_sad"> مستاء جدا</span>
                                    <input type="radio" name="facilities" value="veryUpset" />
                                </div>
                            </div>
                        </li>
                        <li>
                            <span>ما مدى رضاك عن تنظيم الفعالية ؟ </span>
                            <div class="imgs-container">
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_suf">راضي جدا</span>
                                    <input type="radio" name="organization" value="verySatified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="suf">راضي </span>
                                    <input type="radio" name="organization" value="satified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/mid.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="mid">محايد </span>
                                    <input type="radio" name="organization" value="neutral" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="sad"> مستاء</span>
                                    <input type="radio" name="organization" value="upset" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_sad"> مستاء جدا</span>
                                    <input type="radio" name="organization" value="veryUpset" />
                                </div>
                            </div>
                        </li>
                        <li>
                            <span>ما مدى رضاك عن الفعاليات المقامة ؟ </span>
                            <div class="imgs-container">
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_suf">راضي جدا</span>
                                    <input type="radio" name="events" value="verySatified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="suf">راضي </span>
                                    <input type="radio" name="events" value="satified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/mid.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="mid">محايد </span>
                                    <input type="radio" name="events" value="neutral" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="sad"> مستاء</span>
                                    <input type="radio" name="events" value="upset" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_sad"> مستاء جدا</span>
                                    <input type="radio" name="events" value="veryUpset" />
                                </div>
                            </div>
                        </li>
                        <li>
                            <span>ما مدى رضاك عن سهولة الوصول للمهرجان ؟</span>
                            <div class="imgs-container">
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_suf">راضي جدا</span>
                                    <input type="radio" name="access" value="verySatified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/suf.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="suf">راضي </span>
                                    <input type="radio" name="access" value="satified" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/mid.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="mid">محايد </span>
                                    <input type="radio" name="access" value="neutral" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="sad"> مستاء</span>
                                    <input type="radio" name="access" value="upset" />
                                </div>
                                <div class="img-container">
                                    <img src="{{ asset('website/imges/rating/very_sad.svg') }}" alt=""  style="width: 30px;" />
                                    <span class="very_sad"> مستاء جدا</span>
                                    <input type="radio" name="access" value="veryUpset" />
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
