@extends('admin.templates.default')
@section('content')
<div id=alertku></div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Customer</h3>
            </div>

            <div class="box-body">
            <a class="btn btn-success" href="javascript:void(0)" id="createNewCustomer">Tambah Customer</a>
            <p></p>
                <table class="table table-hover table-bordered" id="customerTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Even Date</th>
                        <th>Plan</th>
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
                    <form id="customerForm" name="planForm" class="form-horizontal">
                        @csrf
                       <input type="hidden" name="id" id="id">
                        <div class="form-row">
                            <div class="form-group col-lg-4">
                                <label for="plan_name">Plan Name</label>
                                <select id="plan_name" name="plan_name" class="form-control">
                                    <option>Choose Plan Name</option>
                                    @foreach($plans as $plan)
                                    <option value="{{$plan->name}}">{{$plan->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputCity">City</label>
                                <select id="inputCity" class="form-control">
                                    <option>Choose City</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="zipcode">
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
            var table = $('#customerTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ Route('admin.index.customer') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'email'},
                    {data: 'event_date'},
                    // {data: 'plan.name',name: 'plan.name'},
                    {data: 'plan_name'},
                    {data: 'opsi', orderable:false, searchable:false},
                ]
            });

            $('#createNewCustomer').click(function() {
                $('#saveBtn').html("Create");
                document.getElementById("updateBtn").style.display = "none";
                document.getElementById("saveBtn").style.display = "block";
                $('#id').val('');
                $('#customerForm').trigger("reset");
                $('#modalTitle').html("Create a Plan");
                $('#ajaxModel').modal('show');
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    data: $('#customerForm').serialize(),
                    url: "{{Route('admin.add.customer')}}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data){
                        if($.isEmptyObject(data.error)){
                            $('#customerForm').trigger("reset");
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
                var id = $("#customerForm").find("input[name='id']").val();
                e.preventDefault();
                $.ajax({
                    data: $('#customerForm').serialize(),
                    url: "{{Route('admin.index.customer')}}" + '/update/' + id,
                    type: "PUT",
                    dataType: 'json',
                    success: function (data){
                        if($.isEmptyObject(data.error)){
                            $('#customerForm').trigger("reset");
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

            $('body').on('click', '.edit-customer', function(){
                var id = $(this).data('id');
                $.get('{{Route('admin.index.customer')}}' + '/edit/' + id, function(data){
                    $('#modalTitle').html("Edit Customer");
                    document.getElementById("saveBtn").style.display = "none";
                    document.getElementById("updateBtn").style.display = "block";
                    $('#updateBtn').html("Update");
                    $('#ajaxModel').modal('show');
                    $('#id').val(data.id);
                    document.getElementById("plan_name").value=data[0]['plan_name'];
                    $('#name').val(data.name);
                    $('#price').val(data.price);
                    $('#description').val(data.description);
                })
            });

            $('body').on('click', '.delete-customer', function() {
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
                                url: "{{Route('admin.index.customer')}}" + '/delete/' + id,
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
