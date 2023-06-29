@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>أقسام المنتجات
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline search-form search-box">

                            </form>

                            <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal"
                                data-original-title="test" data-bs-target="#exampleModal">إضافة قسم جديد</button>



                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li  style="display: block;"> * {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="table-responsive table-desi">
                                <table class="table all-package table-category " id="editableTable">
                                    <thead>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>الصورة</th>
                                            <th>القسم الرئيسي</th>
                                            <th>العمليات </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            {{-- <th>{{$category->name}}</th>
                                            <th>{{$category->image}}</th>
                                            <th>{{$category->description}}</th> --}}




                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                 {{-- <img src="{{ asset('storage/' . $image->filename) }}" alt="{{ $image->description }}"> --}}
                                                <td><img src="{{ asset( $category->image) }}" alt="{{ $category->name }}" width="50"></td>
                                                {{-- <td><img src="{{ $category->image }}" alt="{{ $category->name }}" width="50"></td> --}}
                                                <td>{{ $category->prodect_id }}</td>
                                                <td class="d-flex justify-content-around">
                                                  <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-primary">تعديل</a>
                                                  {{-- <a href="{{ route('dashboard.categories.show', $category->id) }}" class="btn btn-success">عرض</a> --}}


                                                  <form action="{{ route('dashboard.categories.delete', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger">حذف</button> --}}
                                                    {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">حذف</button> --}}
                                                    {{-- <a href="{{ route('dashboard.categories.delete', $category->id) }}" class="btn btn-danger">حذف</a> --}}
                                                  </form>
                                                </td>
                                              </tr>

                                        </tr>
                                        @endforeach
                                        {{-- {{$posts}} --}}


                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $categories->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافة قسم جديد </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">

                            <div class="form">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">الإسم :</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="name">
                                </div>




                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">القسم الرئيسي </label>
                                    <select name="parent_id" id="" class="form-control">
                                        <option value="">قسم رئيسي</option>
                                        @foreach ($mainCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group mb-0">
                                    <label for="validationCustom02" class="mb-1">الصورة :</label>
                                    <input class="form-control dropify" id="validationCustom02" type="file"
                                        name="image">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    </div>





    {{-- delete --}}


{{-- ================================================= --}}
<!-- Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد أنك تريد حذف هذا العنصر؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-danger">حذف</button>
            </div>
        </div>
    </div>
</div>
{{-- ================================================= --}}

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{-- {{ Route('dashboard.categories.delete') }} --}}" method="POST">
                <div class="modal-content">

                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <p>متأكد من الحذف .. ؟؟</p>
                            @csrf
                            <input type="hidden" name="id" id="id">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-danger">حذف </button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- delete --}}
@endsection


@push('javascripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#editableTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "",
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'parent',
                        name: 'parent'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]
            });

        });

        $('#editableTable tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script>
@endpush
