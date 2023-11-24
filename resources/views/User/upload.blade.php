
<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">
<div class="card p-3">
    <div class="card-header mb-4">Input valid details.</div>

    <div class="row">
        <div class="col-md-6 d-flex justify-content-center align-items-center mb-2 flex-column">
            <h2 class="mb-5"> Upload  Prescription</h2>
            <form action="{{route('user.store.prescription') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label for="prescription_file">File</label>
                    <input type="file" class="form-control" id="prescription_file" name="prescription_file" required>
                </div>

                <div class="form-group mb-4">
                    <label for="description">Description</label>
                    <br>
                    <textarea name="description" id="description"  required></textarea>
                </div>



                <button type="submit" class="btn btn-primary">Create Book</button>
            </form>
        </div>

        <div class="col-md-6">
            <img src="{{ asset('images/pres.jpg') }}" alt="Background Image" class="img-fluid" style="height: 100%;max-height:500px">
        </div>
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>
