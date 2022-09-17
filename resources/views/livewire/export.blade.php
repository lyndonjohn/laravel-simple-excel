<div>
    @if(session('message'))
        <div class="alert alert-success p-2 mb-3">{{ session('message') }}</div>
    @endif

    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-6">
                <input type="file" class="form-control" name="file">
                @error('file')
                <span class="small text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 d-flex justify-content-start">
                <button type="submit" class="btn btn-primary">Import</button>
                <a wire:click="export" class="btn btn-secondary ms-2">Export Students</a>
            </div>
        </div>
    </form>
</div>
