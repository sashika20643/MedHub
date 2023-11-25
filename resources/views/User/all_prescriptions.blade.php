
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
                                                        <td>@if ($prescription->status=="uploaded")
                                                            <button class="btn btn-outline-primary">Prescription Uploaded</button>
                                                        </td>
                                                        @elseif($prescription->status=="quotation_sent")
                                                        <button class="btn btn-outline-success">Quotation Recived</button>
                                                        @endif
                                                        <td>
                                                            @if($prescription->mainImage())
                                                            <img src="{{ asset('storage/' . $prescription->mainImage()->path) }}" style="max-width: 100px" alt="Prescription Image">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($prescription->status == 'quotation_sent')
                                                                <a href="{{ route('user.quotation',$prescription->id ) }}" class="btn btn-primary">Show Qutation</a>
                                                            @else
                                                            <button href="{{ route('user.quotation',$prescription->id ) }}" disabled="true" class="btn btn-primary">Show Qutation</button>

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
