@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <div class="alert alert-dismissible fade show py-2 bg-danger">
                <div class="d-flex align-items-center">
                    <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
                    </div>
                    <div class="ms-3">
                        <div class="text-white">{{ $error }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
@endif
