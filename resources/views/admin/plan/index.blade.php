@extends('admin.templates.default')
@section('content')
<div id=alertku></div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Package Plan</h3>
            </div>

            <div class="box-body">
            <a class="btn btn-success" href="javascript:void(0)" id="createNewPlan">Tambah Plan</a>
            <p></p>
                <table class="table table-hover table-bordered" id="planTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Price</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="ajaxModel" aria-hidden="true" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTitle"></h4>
                </div>
                <div class="modal-body">
                    <form id="planForm" name="planForm" class="form-horizontal">
                        @csrf
                       <input type="hidden" name="id" id="id">

                       <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Plan" required>
                                @if ($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label for="" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea id="description" name="description" class="form-control" value="{{ old('description') }}" placeholder="Deskripsi Plan" required></textarea>
                                @if ($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' :'' }}">
                            <label for="" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input id="price" name="price" class="form-control" type="number" value="{{ old('price') }}" placeholder="Harga Plan" required>
                                @if ($errors->has('price'))
                                    <p class="help-block">
                                        {{ $errors->first('price') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right" id="saveBtn"></button>
                            <button type="submit" class="btn btn-primary pull-right" id="updateBtn"></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')

<script type="text/javascript">
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var table = $('#planTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ Route('admin.index.plan') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'price'},
                    {data: 'opsi', orderable:false, searchable:false},
                ]
            });

            $('#createNewPlan').click(function() {
                $('#saveBtn').html("Create");
                document.getElementById("updateBtn").style.display = "none";
                document.getElementById("saveBtn").style.display = "block";
                $('#id').val('');
                $('#planForm').trigger("reset");
                $('#modalTitle').html("Create a Plan");
                $('#ajaxModel').modal('show');
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#planForm').serialize(),
                    url: "{{Route('admin.add.plan')}}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data){
                        if($.isEmptyObject(data.error)){
                            $('#planForm').trigger("reset");
                            $('#ajaxModel').modal('hide');
                            table.draw();
                            $('#alertku').html('<div class="alert alert-success" id="alert-success"><button type="button" class="close" data-dismiss="alert">x</button><p>'+data.success+'</p></div>');
                        }else{
                            swal({
                                title: "Gagal Menambah Data",
                                text: data.error,
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            });
                        }
                    },
                    error: function(data){
                        console.log('Error:', data);
                        $('#saveBtn').html('Create');
                    }
                });
            });

            $('#updateBtn').click(function (e) {
                var id = $("#planForm").find("input[name='id']").val();
                e.preventDefault();
                $.ajax({
                    data: $('#planForm').serialize(),
                    url: "{{Route('admin.index.plan')}}" + '/update/' + id,
                    type: "PUT",
                    dataType: 'json',
                    success: function (data){
                        if($.isEmptyObject(data.error)){
                            $('#planForm').trigger("reset");
                            $('#ajaxModel').modal('hide');
                            table.draw();
                            $('#alertku').html('<div class="alert alert-info" id="alert-success"><button type="button" class="close" data-dismiss="alert">x</button><p>'+data.success+'</p></div>');
                        }else{
                            swal({
                                title: "Gagal Memperbarui Data",
                                text: data.error,
                                icon: "error",
                                buttons: true,
                                dangerMode: true,
                            });
                        }
                    },
                    error: function(data){
                        console.log('Error:', data);
                        $('#updateBtn').html('Update');
                    }
                });
            });

            $('body').on('click', '.edit-plan', function(){
                var id = $(this).data('id');
                $.get('{{Route('admin.index.plan')}}' + '/edit/' + id, function(data){
                    $('#modalTitle').html("Edit Plan");
                    document.getElementById("saveBtn").style.display = "none";
                    document.getElementById("updateBtn").style.display = "block";
                    $('#updateBtn').html("Update");
                    $('#ajaxModel').modal('show');
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#price').val(data.price);
                    $('#description').val(data.description);
                })
            });

            $('body').on('click', '.delete-plan', function() {
                var id = $(this).data("id");
                var name = $(this).data("name");
                swal({
                    title: "Apakah kamu yakin akan hapus plan ini ("+ name +")?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if(willDelete){
                            $.ajax({
                                data: {"_token": "{{csrf_token()}}"},
                                type: "DELETE",
                                url: "{{Route('admin.index.plan')}}" + '/delete/' + id,
                                success: function(response){
                                    swal("Data telah terhapus", {
                                        icon: "success",
                                    });
                                        table.draw();
                                },
                                error: function(data){
                                    console.log('Error:' ,data);
                                }
                            });
                        }
                    });

            });
    });
</script>
@endpush
