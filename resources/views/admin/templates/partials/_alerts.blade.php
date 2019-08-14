@if (session('success'))
    <div class="alert alert-success" id="alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ session('success') }}</p>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ session('info') }}</p>
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger" id="alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ session('danger') }}</p>
    </div>
@endif

@if (session('success-guru'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-guru-success" style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success-guru') }}
    </div>
@endif

@if (session('success-admin'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Sukses!</h4>
        {{ session('success-admin') }}
    </div>
@endif
@if (session('danger-admin'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
        {{ session('danger-admin') }}
    </div>
@endif
