@extends('admin.templates.default')
@section('content')
<div id=alertku></div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Transactions</h3>
            </div>

            <div class="box-body">
            {{-- <a class="btn btn-success" href="javascript:void(0)" id="createNewPlan">Tambah Plan</a> --}}
            <p></p>
                <table class="table table-hover table-bordered" id="transactionTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Nama Plan</th>
                        <th>Price Plan</th>
                        <th>Status</th>
                        <th>Code</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

{{-- <div class="modal fade" id="ajaxModel" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle"></h4>
            </div>
            <div class="modal-body">
                <form id="transactionForm" name="transactionForm" class="form-horizontal">
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
</div> --}}

    <div class="modal fade" id="changeStatus" aria-hidden="true" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalStatus"></h4>
                </div>
                <div class="modal-body">
                    <form id="changeStatusForm" name="changeStatusForm" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="transaction_Id" id="transaction_Id">
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Order</label>
                            <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option value="Baru">Belum Terverifikasi</option>
                                <option value="Sudah">Sudah Terverifikasi</option>
                            </select>
                             </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right" id="statusBtn"></button>
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
            var table = $('#transactionTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ Route('admin.index.transaction') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'customer.email', name:'customer.email'},
                    {data: 'plan.name', name:'plan.name'},
                    {data: 'plan.price', name:'plan.price'},
                    {data: 'status', orderable:false, searchable:false, className:'text-center'},
                    {data: 'code', name:'transactions.code'},
                    {data: 'opsi', orderable:false, searchable:false},
                ]
            });

            $('#statusBtn').click(function (e) {
                var id = $("#changeStatusForm").find("input[name='transaction_Id']").val();
                console.log(id);
                e.preventDefault();
                $.ajax({
                    data: $('#changeStatusForm').serialize(),
                    url: "{{Route('admin.index.transaction')}}" + '/verify/' + id,
                    type: "PUT",
                    dataType: 'json',
                    success: function (data){
                        $('#changeStatusForm').trigger("reset");
                        table.draw();
                        $('#changeStatus').modal('hide');
                        $('#alertku').html('<div class="alert alert-success" id="alert-success"><button type="button" class="close" data-dismiss="alert">x</button><p>'+data.success+'</p></div>');
                    },
                    error: function(data){
                        console.log('Error:', data);
                        $('#statusBtn').html('Save');
                    }
                });
            });

            $('body').on('click', '.status-transaction', function(){
                var id = $(this).data('id');
                $.get('{{Route('admin.index.transaction')}}' + '/edit/' + id, function(data){
                    $('#modalStatus').html("Change Status");
                    $('#statusBtn').html("Save");
                    $('#changeStatus').modal('show');
                    $('#transaction_Id').val(data[0]['id']);
                    document.getElementById("status").value = data[0]['status'];
                })
            });

            $('body').on('click', '.select-transaction', function(){
                var id = $(this).data('id');
                $.get('{{Route('admin.index.transaction')}}' + '/edit/' + id, function(data){
                    console.log(data);
                    // $('#modalStatus').html("Change Status");
                    // $('#statusBtn').html("Save");
                    // $('#changeStatus').modal('show');
                    // $('#transaction_Id').val(data.id);
                    // document.getElementById("status").value = data.status;
                })
            });

    });
</script>
@endpush
