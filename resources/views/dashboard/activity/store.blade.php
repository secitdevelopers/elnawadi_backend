@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <style>
        .file-upload {
            position: relative;
            display: inline-block;
        }

        color-input-group {
            display: flex;
            align-items: center;
        }

        .color-input {
            margin-right: 10px;
        }

        .price-input {
            width: 150px;
        }


        .file-upload input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload label {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .file-upload label span {
            margin-right: 10px;
        }

        .file-preview {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .file-preview img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">النشاط</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                    منتج</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('Edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data">
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="row">

            {{-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ --}}

            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <!--div-->
                <div class="card">



                    <div class="card-body">
                        {{-- | name ar | en | cateogery | sub cateogery --}}
                        <div class="row row-sm">
                            <div class="col-lg">
                                <p class="mg-b-10">اسم النشاط</p>
                                <input class="form-control {{ $errors->has('name_ar') ? 'is-invalid' : '' }}"
                                    placeholder="اسم النشاط" type="text" name="name_ar" required>
                            </div>

                            {{-- <div class="col-lg">
                                <p class="mg-b-10">الاسم باللغه الانجليزيه</p>
                                <input class="form-control" placeholder="الاسم باللغه الانجليزيه"type="text"
                                    name="name_en" value="" required>
                            </div> --}}

                            <div class="col-lg">
                                <p class="mg-b-10">العنوان</p>
                                <input class="form-control" placeholder="العنوان"type="text" name="adress"
                                    value="" required>
                            </div>

                            <div class="col-lg">
                                <p class="mg-b-10">مدة النشاط</p>
                                <input class="form-control" placeholder="قم بإدخال المدة"type="text"
                                    name="activity_duration" value="" required>
                            </div>

                            <div class="col-lg">
                                <p class="mg-b-10"> النادي التابع للنشاط</p>
                                <select id="activities_catogeries_id" name="activities_catogeries_id"
                                    class="form-control SlectBox" required>
                                    <option value="">اختار النادي</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name_ar }} </option>
                                    @endforeach
                                </select>
                            </div>



                        </div>
                    </div>








                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    سعر + الوصف
                                </div>
                                <br>
                                <br>
                                <div class="row row-sm">


                                    {{-- 
                                    <div class="col-lg-3">
                                        <p class="mg-b-10">السعر الرئيسي</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                placeholder="قم بإدخال سعر" type="number" name="price" min="1"
                                                required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div> --}}







                                    <div class="col-lg-3">
                                        <p class="mg-b-10">سعر التسجيل شخص</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                placeholder="قم بإدخال سعر" type="number" name="price" min="1"
                                                required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>










                                    <div class="col-lg-3">

                                        <p class="mg-b-10">وقت البدء </p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control" id="datetimepicker2" type="text"
                                                name="start_data" value="{{ date('Y-m-d H:i:s') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        {{-- <label for=""></label> --}}
                                        <p class="mg-b-10">وقت الانتهاء </p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control" id="datetimepicker1" type="text"
                                                name="end_data" value="{{ date('Y-m-d H:i:s') }}">
                                        </div>
                                    </div>

                                    <div class="row row-sm">

                                    </div>
                                </div> <br><br>
                                <div class="main-content-label mg-b-5">
                                    وصف النشاط
                                </div>
                                <br>

                                <textarea id="textarea" name="description_ar" rows="15">اكتب وصف النشاط</textarea>
                            </div>
                        </div>
                    </div>






                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-sm-12 col-md-4">
                                                <label for="image" class="col-form-label">فديو او صورة</label>
                                                <input type="file" class="dropify" data-default-file="" required
                                                    data-height="200" name="image" enctype="multipart/form-data" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                    <br>

                    <button type="submit" class="btn btn-danger"
                        style="width:200px; height:50px; background-color: blue; color:white; margin: 0 auto;">حفظ
                    </button>


                </div>
            </div>
        </div>


    </form>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        const discountField = document.getElementById('discount-field');
        const discountTimeFields = document.getElementById('discount-time-fields');

        // دالة لإظهار حقول الوقت
        function showDiscountTimeFields() {
            discountTimeFields.style.display = 'block';
        }

        // دالة لإخفاء حقول الوقت
        function hideDiscountTimeFields() {
            discountTimeFields.style.display = 'none';
        }

        // ربط حدث تغيير حقل الخصم بدالتي الإظهار والإخفاء
        discountField.addEventListener('change', function() {
            // إذا كان القيمة غير صفرية، أظهر حقول الوقت، وإلا أخفها
            if (discountField.value > 0) {
                showDiscountTimeFields();
            } else {
                hideDiscountTimeFields();
            }
        });
    </script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <script>
        // Set custom validation message for required fields
        var requiredFields = document.querySelectorAll('[required]');
        for (var i = 0; i < requiredFields.length; i++) {
            requiredFields[i].addEventListener('invalid', function() {
                if (this.value.trim() === "") {
                    this.setCustomValidity('لا يمكنك ترك هذه الحقل فارغا');
                } else {
                    this.setCustomValidity('قيمه غير صحيحه');
                }
            });
            requiredFields[i].addEventListener('input', function() {
                this.setCustomValidity(
                    ''); // Reset custom validity message on input to ensure new message can be set
            });
        }
    </script>


    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('textarea');
    </script>



    <script>
        document.getElementById('multimg').addEventListener('change', function() {
            var previewContainer = document.querySelector('.file-preview');
            previewContainer.innerHTML = '';

            var files = this.files;
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    previewContainer.appendChild(imgElement);
                }

                reader.readAsDataURL(files[i]);
            }
        });
    </script>
@endsection
