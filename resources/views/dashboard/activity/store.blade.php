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
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
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
                                    placeholder="اسم النشاط" type="text" name="name_ar" value="{{ old('name_ar') }}"
                                    required>
                            </div>

                            {{-- <div class="col-lg">
                                <p class="mg-b-10">الاسم باللغه الانجليزيه</p>
                                <input class="form-control" placeholder="الاسم باللغه الانجليزيه"type="text"
                                    name="name_en" value="" required>
                            </div> --}}

                            <div class="col-lg">
                                <p class="mg-b-10">العنوان</p>
                                <input class="form-control" placeholder="العنوان"type="text" name="name_en"
                                    value="" required>
                            </div>

                            <div class="col-lg">
                                <p class="mg-b-10">مدة النشاط</p>
                                <input class="form-control" placeholder="قم بإدخال المدة"type="text" name="name_en"
                                    value="" required>
                            </div>

                            <div class="col-lg">
                                <p class="mg-b-10"> النادي التابع للنشاط</p>
                                <select id="category" name="category" class="form-control SlectBox" required>
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
                                    سعر النشاط
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
                                                placeholder="قم بإدخال سعر" type="number" name="price_for_two"
                                                min="1" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <p class="mg-b-10">سعر التسجيل شخصين</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                placeholder="قم بإدخال سعر" type="number" name="price_for_two"
                                                min="1" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="mg-b-10">سعر التسجيل ثلاثة اشخاص</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                                placeholder="قم بإدخال سعر" type="number" name="price_for_one"
                                                min="1" required>
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
                                                name="discount_start" value="{{ date('Y-m-d H:i:s') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3"><label for=""></label>
                                        <p class="mg-b-10">وقت الانتهاء </p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control" id="datetimepicker1" type="text"
                                                name="discount_end" value="{{ date('Y-m-d H:i:s') }}">
                                        </div>
                                    </div>
                                    <div class="row row-sm">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    وصف النشاط
                                </div>
                                <br>

                                <textarea id="textarea2" name="description_ar" rows="15">اكتب وصف النشاط</textarea>
                            </div>
                        </div>
                    </div>






                    <svg xmlns="http://www.w3.org/2000/svg" width="545" height="94" viewBox="0 0 545 94"
                        fill="none">
                        <path
                            d="M3.86551 0.7393C2.51628 1.41613 1.41613 2.51628 0.739299 3.86551L1.18455 4.05015L0.993026 4.51201C0.675501 5.27772 0.5 6.11773 0.5 7V8.98865V9.48865H0V12.466H0.5V12.966V16.9432V17.4432H0V20.4205H0.5V20.9205V24.8979V25.3979H0V28.3752H0.5V28.8752V32.8525V33.3525H0V36.3298H0.5V36.8298V40.8071V41.3071H0V44.2844H0.5V44.7844V48.7617V49.2617H0V52.2389H0.5V52.7389V56.7162V57.2162H0V60.1935H0.5V60.6935V64.6708V65.1708H0V68.1481H0.5V68.6481V72.6254V73.1254H0V76.1027H0.5V76.6027V80.58V81.08H0V84.0574H0.5V84.5574V86.546C0.5 87.4283 0.675501 88.2683 0.993027 89.034L1.18455 89.4958L0.7393 89.6805C1.41613 91.0297 2.51628 92.1299 3.86551 92.8067L4.05015 92.3614L4.51201 92.553C5.27772 92.8705 6.11773 93.046 7 93.046H9.00832H9.50832V93.546H12.525V93.046H13.025H17.0416H17.5416V93.546H20.5583V93.046H21.0583H25.0749H25.5749V93.546H28.5915V93.046H29.0915H33.1082H33.6082V93.546H36.6248V93.046H37.1248H41.1415H41.6415V93.546H44.6581V93.046H45.1581H49.1748H49.6748V93.546H52.6914V93.046H53.1914H57.208H57.708V93.546H60.7247V93.046H61.2247H65.2413H65.7413V93.546H68.758V93.046H69.258H73.2746H73.7746V93.546H76.7913V93.046H77.2913H81.3079H81.8079V93.546H84.8246V93.046H85.3246H89.3412H89.8412V93.546H92.8579V93.046H93.3579H97.3745H97.8745V93.546H100.891V93.046H101.391H105.408H105.908V93.546H108.924V93.046H109.424H113.441H113.941V93.546H116.958V93.046H117.458H121.474H121.974V93.546H124.991V93.046H125.491H129.508H130.008V93.546H133.024V93.046H133.524H137.541H138.041V93.546H141.058V93.046H141.558H145.574H146.074V93.546H149.091V93.046H149.591H153.608H154.108V93.546H157.124V93.046H157.624H161.641H162.141V93.546H165.158V93.046H165.658H169.674H170.174V93.546H173.191V93.046H173.691H177.707H178.207V93.546H181.224V93.046H181.724H185.741H186.241V93.546H189.257V93.046H189.757H193.774H194.274V93.546H197.291V93.046H197.791H201.807H202.307V93.546H205.324V93.046H205.824H209.841H210.341V93.546H213.357V93.046H213.857H217.874H218.374V93.546H221.391V93.046H221.891H225.907H226.407V93.546H229.424V93.046H229.924H233.941H234.441V93.546H237.457V93.046H237.957H241.974H242.474V93.546H245.49V93.046H245.99H250.007H250.507V93.546H253.524V93.046H254.024H258.04H258.54V93.546H261.557V93.046H262.057H266.074H266.574V93.546H269.59V93.046H270.09H274.107H274.607V93.546H277.624V93.046H278.124H282.14H282.64V93.546H285.657V93.046H286.157H290.173H290.673V93.546H293.69V93.046H294.19H298.207H298.707V93.546H301.723V93.046H302.223H306.24H306.74V93.546H309.757V93.046H310.257H314.273H314.773V93.546H317.79V93.046H318.29H322.307H322.807V93.546H325.823V93.046H326.323H330.34H330.84V93.546H333.856V93.046H334.356H338.373H338.873V93.546H341.89V93.046H342.39H346.406H346.906V93.546H349.923V93.046H350.423H354.44H354.94V93.546H357.956V93.046H358.456H362.473H362.973V93.546H365.989V93.046H366.489H370.506H371.006V93.546H374.023V93.046H374.523H378.539H379.039V93.546H382.056V93.046H382.556H386.573H387.073V93.546H390.089V93.046H390.589H394.606H395.106V93.546H398.123V93.046H398.623H402.639H403.139V93.546H406.156V93.046H406.656H410.672H411.172V93.546H414.189V93.046H414.689H418.706H419.206V93.546H422.222V93.046H422.722H426.739H427.239V93.546H430.256V93.046H430.756H434.772H435.272V93.546H438.289V93.046H438.789H442.805H443.305V93.546H446.322V93.046H446.822H450.839H451.339V93.546H454.355V93.046H454.855H458.872H459.372V93.546H462.389V93.046H462.889H466.905H467.405V93.546H470.422V93.046H470.922H474.939H475.439V93.546H478.455V93.046H478.955H482.972H483.472V93.546H486.488V93.046H486.988H491.005H491.505V93.546H494.522V93.046H495.022H499.038H499.538V93.546H502.555V93.046H503.055H507.072H507.572V93.546H510.588V93.046H511.088H515.105H515.605V93.546H518.622V93.046H519.122H523.138H523.638V93.546H526.655V93.046H527.155H531.172H531.672V93.546H534.688V93.046H535.188H537.197C538.079 93.046 538.919 92.8705 539.685 92.553L540.147 92.3614L540.331 92.8067C541.681 92.1299 542.781 91.0297 543.458 89.6805L543.012 89.4958L543.204 89.034C543.522 88.2683 543.697 87.4283 543.697 86.546V84.5574V84.0574H544.197V81.08H543.697V80.58V76.6027V76.1027H544.197V73.1255H543.697V72.6255V68.6481V68.1481H544.197V65.1708H543.697V64.6708V60.6935V60.1935H544.197V57.2162H543.697V56.7162V52.7389V52.2389H544.197V49.2616H543.697V48.7616V44.7843V44.2843H544.197V41.307H543.697V40.807V36.8298V36.3298H544.197V33.3525H543.697V32.8525V28.8752V28.3752H544.197V25.3979H543.697V24.8979V20.9206V20.4206H544.197V17.4433H543.697V16.9433V12.9659V12.4659H544.197V9.48865H543.697V8.98865V7C543.697 6.11773 543.522 5.27772 543.204 4.51201L543.012 4.05015L543.458 3.86551C542.781 2.51628 541.681 1.41613 540.331 0.739297L540.147 1.18456L539.685 0.99303C538.919 0.675502 538.079 0.5 537.197 0.5H535.189H534.689V0H531.672V0.5H531.172H527.155H526.655V0H523.639V0.5H523.139H519.122H518.622V0H515.605V0.5H515.105H511.089H510.589V0H507.572V0.5H507.072H503.056H502.556V0H499.539V0.5H499.039H495.022H494.522V0H491.506V0.5H491.006H486.989H486.489V0H483.472V0.5H482.972H478.956H478.456V0H475.439V0.5H474.939H470.922H470.422V0H467.406V0.5H466.906H462.889H462.389V0H459.372V0.5H458.872H454.856H454.356V0H451.339V0.5H450.839H446.823H446.323V0H443.306V0.5H442.806H438.789H438.289V0H435.273V0.5H434.773H430.756H430.256V0H427.239V0.5H426.739H422.723H422.223V0H419.206V0.5H418.706H414.689H414.189V0H411.173V0.5H410.673H406.656H406.156V0H403.139V0.5H402.639H398.623H398.123V0H395.106V0.5H394.606H390.589H390.089V0H387.073V0.5H386.573H382.556H382.056V0H379.04V0.5H378.54H374.523H374.023V0H371.006V0.5H370.506H366.49H365.99V0H362.973V0.5H362.473H358.456H357.956V0H354.94V0.5H354.44H350.423H349.923V0H346.906V0.5H346.406H342.39H341.89V0H338.873V0.5H338.373H334.356H333.856V0H330.84V0.5H330.34H326.323H325.823V0H322.806V0.5H322.306H318.29H317.79V0H314.773V0.5H314.273H310.257H309.757V0H306.74V0.5H306.24H302.223H301.723V0H298.707V0.5H298.207H294.19H293.69V0H290.673V0.5H290.173H286.157H285.657V0H282.64V0.5H282.14H278.123H277.623V0H274.607V0.5H274.107H270.09H269.59V0H266.573V0.5H266.073H262.057H261.557V0H258.54V0.5H258.04H254.024H253.524V0H250.507V0.5H250.007H245.99H245.49V0H242.474V0.5H241.974H237.957H237.457V0H234.44V0.5H233.94H229.924H229.424V0H226.407V0.5H225.907H221.891H221.391V0H218.374V0.5H217.874H213.857H213.357V0H210.341V0.5H209.841H205.824H205.324V0H202.307V0.5H201.807H197.791H197.291V0H194.274V0.5H193.774H189.757H189.257V0H186.241V0.5H185.741H181.724H181.224V0H178.208V0.5H177.708H173.691H173.191V0H170.174V0.5H169.674H165.658H165.158V0H162.141V0.5H161.641H157.624H157.124V0H154.108V0.5H153.608H149.591H149.091V0H146.074V0.5H145.574H141.558H141.058V0H138.041V0.5H137.541H133.525H133.025V0H130.008V0.5H129.508H125.491H124.991V0H121.975V0.5H121.475H117.458H116.958V0H113.941V0.5H113.441H109.425H108.925V0H105.908V0.5H105.408H101.392H100.892V0H97.8749V0.5H97.3749H93.3583H92.8583V0H89.8416V0.5H89.3416H85.325H84.825V0H81.8084V0.5H81.3084H77.2917H76.7917V0H73.7751V0.5H73.2751H69.2585H68.7585V0H65.7419V0.5H65.2419H61.2252H60.7252V0H57.7086V0.5H57.2086H53.192H52.692V0H49.6753V0.5H49.1753H45.1587H44.6587V0H41.6421V0.5H41.1421H37.1254H36.6254V0H33.6088V0.5H33.1088H29.0922H28.5922V0H25.5755V0.5H25.0755H21.0588H20.5588V0H17.5422V0.5H17.0422H13.0255H12.5255V0H9.50886V0.5H9.00886H7C6.11773 0.5 5.27772 0.675501 4.51201 0.993027L4.05015 1.18455L3.86551 0.7393Z"
                            fill="white" stroke="#595BB5" stroke-linecap="square" stroke-dasharray="4 4" />
                    </svg>




                    <br>
                    <p></p>
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
                this.setCustomValidity('لا يمكنك ترك هذه الحقل فارغا');
            });
            requiredFields[i].addEventListener('input', function() {
                this.setCustomValidity('لا يمكنك ترك هذه الحقل فارغا');
            });
        }
    </script>
    <script>
        $(function() {
            $(document)
                .on("click", ".btn-add", function(e) {
                    e.preventDefault();
                    var controlForm = $("#myRepeatingFields:first"),
                        currentEntry = $(this).parents(".entry:first"),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);
                    newEntry.find("input").val("");
                    controlForm.find(".entry:not(:last) .btn-add").removeClass("btn-add").addClass("btn-remove")
                        .removeClass("btn-success").addClass("btn-danger").html("-");
                })
                .on("click", ".btn-remove", function(e) {
                    e.preventDefault();
                    $(this).parents(".entry:first").remove();
                    return false;
                });
        });
        $(function() {
            $(document)
                .on("click", ".btn-add-co", function(e) {
                    e.preventDefault();
                    var controlForm = $("#myRepeatingFields_co:first"),
                        currentEntry = $(this).parents(".entry_co:first"),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);
                    newEntry.find("input").val("");
                    controlForm.find(".entry_co:not(:last) .btn-add-co").removeClass("btn-add-co").addClass(
                        "btn-remove-co").removeClass("btn-success").addClass("btn-danger").html("-");
                })
                .on("click", ".btn-remove-co", function(e) {
                    e.preventDefault();
                    $(this).parents(".entry_co:first").remove();
                    return false;
                });
        });
        $(function() {
            $(document)
                .on("click", ".btn-add-op", function(e) {
                    e.preventDefault();
                    var controlForm = $("#myRepeatingFields_op:first"),
                        currentEntry = $(this).parents(".entry_op:first"),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);
                    newEntry.find("input").val("");
                    controlForm.find(".entry_op:not(:last) .btn-add-op").removeClass("btn-add-op").addClass(
                        "btn-remove-op").removeClass("btn-success").addClass("btn-danger").html("-");
                })
                .on("click", ".btn-remove-op", function(e) {
                    e.preventDefault();
                    $(this).parents(".entry_op:first").remove();
                    return false;
                });
        });







        $(function() {
            $(document)
                .on("click", ".btn-add-opp", function(e) {
                    e.preventDefault();
                    var controlForm = $("#myRepeatingFields_opp:first"),
                        currentEntry = $(this).parents(".entry_opp:first"),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);
                    newEntry.find("input").val("");
                    controlForm.find(".entry_opp:not(:last) .btn-add-opp").removeClass("btn-add-opp").addClass(
                        "btn-remove-opp").removeClass("btn-success").addClass("btn-danger").html("-");
                })
                .on("click", ".btn-remove-opp", function(e) {
                    e.preventDefault();
                    $(this).parents(".entry_opp:first").remove();
                    return false;
                });
        });
    </script>
    <script>
        $(function() {
            // Multiple images preview in browser



            var imagesPreview = function(input, placeToInsertImagePreview) {



                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                placeToInsertImagePreview);
                        }
                        console.log("Selected picture name: 111");
                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };
            console.log("Selected picture name: 222");
            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });

        });
    </script>


    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('textarea');
    </script>


    <script>
        CKEDITOR.replace('textarea2');
    </script>

    <script>
        CKEDITOR.replace('textarea3');
    </script>
    <script>
        CKEDITOR.replace('textarea4');
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




















    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryId = $(this).val();
                var subCategoryDropdown = $('#sub_category');

                if (categoryId) {
                    // Make an AJAX request to fetch the subsections based on the selected section
                    $.ajax({
                        url: '{{ route('getSubsections') }}',
                        type: 'GET',
                        data: {
                            category: categoryId
                        },
                        success: function(response) {
                            console.log(response);
                            console.log("------------------");
                            console.log(response.data);
                            // Clear previous options
                            subCategoryDropdown.empty();

                            // Add default option
                            // subCategoryDropdown.append(
                            //     '<option value="">Select a subsection</option>');

                            // Populate the subsection dropdown with the received data
                            $.each(response, function(key, value) {
                                console.log(value + key);
                                subCategoryDropdown.append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    // Clear the subsection dropdown if no section is selected
                    subCategoryDropdown.empty();
                }
            });
        });
    </script>
@endsection
