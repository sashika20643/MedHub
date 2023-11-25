<x-app-layout>
    <div style="width:100vw; padding:5px;">

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please check the form and try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </div>
    <div class="container mt-5" style="width:100vw">
        <div class="row w-100 d-flex justify-content-center align-items-center">
            <div class=" col-md-10">
                <div class="card bg-light mb-4">

                    <div class="card-body col-md-10">
                        <p class="lead">Welcome to your Admin dashboard, {{ auth()->user()->name }}!</p>

                        <div class="mt-4 text-right">
                            <a href="{{route('admin.drugs.index') }}" class="btn btn-primary">Drugs</a>
                            <a href="{{route('admin.prescriptions.index') }}" class="btn btn-success">Prescriptions</a>
                        </div>

                        <div class="row mt-4 justify-content-center align-items-center">
                            <div class="col-md-4">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white">
                                        Uploaded Prescriptions
                                    </div>
                                    <div class="card-body">
                                        <p class="lead">Total: {{$recived}}</p>
                                        <a href="{{route('admin.prescriptions.index') }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="card border-info">
                                    <div class="card-header bg-info text-white">
                                        Approved Quotations
                                    </div>
                                    <div class="card-body">

                                        <p class="lead">Total: {{$approved}}</p>
                                        <a href="{{route('admin.prescriptions.index') }}" class="btn btn-info">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-warning">
                                    <div class="card-header bg-warning text-white">
                                        Rejected Quotations
                                    </div>
                                    <div class="card-body">

                                        <p class="lead">Total: {{$rejected}}</p>
                                        <a href="{{route('admin.prescriptions.index') }}" class="btn btn-warning">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
