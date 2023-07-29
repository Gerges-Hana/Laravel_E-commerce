@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> المنتجات
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

                            <a class="btn btn-primary mt-md-0 mt-2" href="{{route('dashboard.products.create')}}">إضافة منتج جديد</a>




                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive table-desi">
                                <table class="table all-package table-category " id="editableTable">
                                    <thead>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>القسم </th>
                                            <th>السعر الأساسي</th>
                                            <th>التخفيض الأساسي</th>
                                            <th>الصوره</th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>

                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{$product->Category?->name}}</td>
                                                <td>{{ $product->price }}</td>
                                                <th>{{ $product->discount_price }}</th>
                                                <td><img src="{{ asset( $product->image) }}" alt="{{ $product->name }}" width="50"></td>
                                                {{-- <td><img src="{{ $product->image }}" alt="{{ $product->name }}" width="50"></td> --}}





                                                {{-- <td class="d-flex justify-content-around">
                                                  <a type="" href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-info py-0">تعديل</a>
                                                  <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a type="submit" class="btn btn-danger">حذف</a>
                                                  </form>
                                                </td> --}}




                                                {{-- =========================== --}}
                                                <td class="d-flex justify-content-around justify-items-center">
                                                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-primary m-1" style="height: 90%">تعديل</a>
                                                    {{-- <a href="{{ route('dashboard.categories.show', $category->id) }}" class="btn btn-success">عرض</a> --}}


                                                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger m-1" style="height: 90%">حذف</button>
                                                      {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">حذف</button> --}}
                                                      {{-- <a href="{{ route('dashboard.categories.delete', $category->id) }}" class="btn btn-danger">حذف</a> --}}
                                                    </form>
                                                  </td>
                                                {{-- =========================== --}}
                                              </tr>

                                        </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                            </div>
                            {{-- <div class="pagination m-auto"> --}}
                               <p class="text-center"> {{ $products->links() }}</p>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this item?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
{{-- ================================================ --}}

{{-- ================================================ --}}

    </div>
    </div>
@endsection

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      modal.find('form').attr('action', '/delete/' + id)
    })
  </script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
