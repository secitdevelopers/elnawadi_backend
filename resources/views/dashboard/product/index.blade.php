@extends('layouts.master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <style>
        /* CSS for image container */
        .image-container {
            width: 50px;
            height: 50px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }

        /* CSS for the circular image */
        .image-container img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات /</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">جميع
                    المنتجات</span>
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

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
                        href="#modaldemo8">اضافة صنف</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">صور المنتج او فديو</th>
                                    <th class="wd-18p border-bottom-0">اسم المنتج</th>
                                    <th class="wd-15p border-bottom-0">التصنيف</th>

                                    <th class="wd-15p border-bottom-0">الوصف</th>
                                    <th class="wd-15p border-bottom-0">سعر المنتج</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($products as $product)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        </td>
                                        <td>
                                            <div class="image-container">
                                                <img src="{{ asset($product->image) }}" alt="Avatar Image">
                                            </div>
                                        </td>
                                        <td>{{ $product->name_ar }}</td>
                                        <td>

                                            {{ $product->category->name_ar }}


                                        </td>
                                        <td>{{ Str::limit($product->description_ar, 30) }}</td>
                                        <td>{{ $product->price }}</td>



                                        <td>
                                            <div class="d-flex">
                                                @can('حالة منتج')
                                                    <div class="main-toggle main-toggle-success {{ $product->status == true ? 'on' : '' }} btn-sm ml-2"
                                                        data-product-id="{{ $product->id }}">
                                                        <span></span>
                                                    </div>
                                                @endcan
                                                @can('تعديل منتج')
                                                    <a class="modal-effect btn btn-sm btn-info btn-sm ml-2"
                                                        data-effect="effect-scale" data-id="{{ $product->id }}"
                                                        data-price="{{ $product->price }}"
                                                        data-category_id="{{ $product->category_id }}"
                                                        data-description_ar="{{ $product->description_ar }}"
                                                        data-name_ar="{{ $product->name_ar }}" {{-- data-name_en="{{ $catogery->name_en }}" --}}
                                                        data-status="{{ $product->status }}" {{-- data-arrange="{{ $catogery->arrange }}" --}}
                                                        data-image="{{ $product->image }}" data-toggle="modal"
                                                        href="#exampleModal2" title="تعديل"><i class="las la-pen">

                                                        </i>
                                                    </a>
                                                @endcan
                                                @can('حذف منتج')
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{ $product->id }}" data-name="{{ $product->name_ar }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                            class="las la-trash"></i></a>
                                                @endcan
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة المنتج</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name_ar">اسم المنتج</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                            </div>


                            <label for="category_id">الاقسام</label>
                            <select id="category_id" name="category_id" class="form-control SlectBox" required>
                                <option value="">اختار قسم</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_ar }} </option>
                                @endforeach
                            </select>


                            <br>
                            <label for="price">سعر المنتج</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                    placeholder="السعر" type="number" name="price" id="price" min="1"
                                    required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>


                            <label for="description_ar">وصف المنتج</label>
                            <textarea class="form-control" rows="3" name="description_ar" id="description_ar"> </textarea>


                            <br>

                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">اسم المنتج باللغه الانجليزيه</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" required>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">ترتيب المنتج </label>
                                <input type="number" class="form-control" id="arrange" name="arrange">
                            </div> --}}
                            <div class="form-group">
                                <label for="image">إضافة صورة/ فديو</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image"
                                        required>
                                    <label class="custom-file-label" for="image">اختار صورة/ فديو</label>
                                </div>
                                <img src="#" id="preview"
                                    style="display: none; max-width: 200px; max-height: 200px;">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- row closed -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل المنتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                            {{ method_field('post') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name_ar">اسم المنتج</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" required>
                            </div>

                            <input type="text" class="form-control" id="id" name="id" hidden>
                            <label for="category_id">الاقسام</label>
                            <select id="category_id" name="category_id" class="form-control SlectBox" required>
                                <option value="">اختار قسم</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name_ar }} </option>
                                @endforeach
                            </select>


                            <br>
                            <label for="price">سعر المنتج</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                    placeholder="السعر" type="number" name="price" id="price" min="1"
                                    required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>


                            <label for="description_ar">وصف المنتج</label>
                            <textarea class="form-control" rows="3" name="description_ar" id="description_ar"></textarea>


                            <br>

                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">اسم المنتج باللغه الانجليزيه</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" required>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">ترتيب المنتج </label>
                                <input type="number" class="form-control" id="arrange" name="arrange">
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="image">إضافة صورة/ فديو</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image"
                                        required>
                                    <label class="custom-file-label" for="image">اختار صورة/ فديو</label>
                                </div>
                                <img src="#" id="preview"
                                    style="display: none; max-width: 200px; max-height: 200px;">
                            </div> --}}

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">إضافة صورة/ فديو</label>
                                <input class="form-control" name="image" id="image" type="file"
                                    onchange="displaySelectedImage(event)">
                                <img src="image" id="preview-image" class="img-thumbnail"
                                    style="width: 100px; height: 100px;">
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف المنتج</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('products.destroy') }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل أنت متأكد من عملية الحذف؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name" id="name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تأكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@section('js')
    <script>
        const mainRoute = "{{ env('MAIN_ROUTE') }}";
    </script>
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script>
        document.querySelector("#image").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#preview").setAttribute("src", e.target.result);
                document.querySelector("#preview").style.display = "block";
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>

    <script>
        document.querySelector("#image").addEventListener("change", function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#preview").setAttribute("src", e.target.result);
                document.querySelector("#preview").style.display = "block";
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script>
        function displaySelectedImage(event) {
            const fileInput = event.target;
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewImage = document.getElementById('preview-image');
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>


    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.main-toggle').on('click', function() {
                $(this).toggleClass('on');
                var isToggleOn = $(this).hasClass('on');
                var url = '{{ route('products.update-status') }}';
                var productId = $(this).data('product-id');
                // Retrieve the CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        isToggleOn: isToggleOn,
                        productId: productId
                    },
                    success: function(response) {
                        console.log(response);
                        // Handle the success response
                    },
                    error: function(error) {
                        console.log(error);
                        // Handle the error response
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const appUrl = "{{ url('/') }}";
            $('#exampleModal2').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name_ar = button.data('name_ar')
                var price = button.data('price')
                var description_ar = button.data('description_ar')
                var status = button.data('status')
                var image = button.data('image')
                var category_id = button.data('category_id')
                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #category_id').val(category_id)
                modal.find('.modal-body #name_ar').val(name_ar)
                modal.find('.modal-body #preview-image').attr('src', appUrl + "/" + image)
                modal.find('.modal-body #price').val(price)
                modal.find('.modal-body #description_ar').val(description_ar)
                modal.find('.modal-body #status').val(status)
            })
        });
    </script>
@endsection
