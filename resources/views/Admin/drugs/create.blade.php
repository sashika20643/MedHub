
<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">
<div class="card p-3">
    <div class="card-header mb-4">Input valid details.</div>

    <div class="row">
        <div class="col-md-6 d-flex justify-content-center align-items-center mb-2 flex-column">
            <h2 class="mb-5">Create Drug</h2>
            <form action="{{route('admin.drugs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-4">
                    <label for="prescription_file">name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group mb-4">
                    <label for="price">price</label>
                    <input type="number" step="0.01" class="form-control" name="price" required>
                                </div>

         <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" required>
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
