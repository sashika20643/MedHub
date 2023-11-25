
<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Uploaded Prescriptions
                                </div>
                                <div class="card-body" style="overflow: scroll" >
                                    @if(count($uploadedPrescriptions) > 0)
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Prescription Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($uploadedPrescriptions as $prescription)
                                                    <tr>
                                                        <td>{{ $prescription->description }}</td>
                                                        <td>{{ $prescription->status }}</td>
                                                        <td>
                                                            @if($prescription->mainImage())
                                                            <img src="{{ asset('storage/' . $prescription->mainImage()->path) }}" style="max-width: 100px" alt="Prescription Image">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($prescription->status == 'processed')
                                                                <a href="{{ route('prescriptions.show', $prescription->id) }}" class="btn btn-primary">Show Prescription</a>
                                                            @else
                                                            <button href="#" disabled="true" class="btn btn-primary">Show Qutation</button>

                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p>No uploaded prescriptions found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>
</div>
</x-app-layout>
