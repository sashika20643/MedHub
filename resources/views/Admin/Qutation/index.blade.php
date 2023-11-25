<x-app-layout>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admin - Received Prescriptions
                </div>
                <div class="card-body">
                    @if(count($prescriptions) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Customer</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->user->name }}</td>
                                        <td>{{ $prescription->description }}</td>
                                        <td>
                                            @if($prescription->status == 'quotation_sent')
                                                Quotation Sent
                                            @else
                                                Not Sent
                                            @endif
                                        </td>
                                        <td>
                                            @if ($prescription->quotation)

                                            @if($prescription->quotation->status == 'pending')
                                            <button class="btn btn-outline-warning">pending</button>
                                            @elseif ($prescription->quotation->status =='rejected' )
                                            <button class="btn btn-outline-danger">Rejected</button>
                                            @else
                                            <button class="btn btn-outline-success">Approved</button>
                                            @endif
                                            @else
                                            <button class="btn btn-outline-primary">No quotation</button>
                                            @endif


                                        </td>
                                        <td>
                                            @if($prescription->status != 'quotation_sent')
                                            <a href="{{ route('admin.add-quotation', $prescription->id) }}" class="btn btn-primary">Add Quotation</a>
                                            @else
                                            <button  class="btn btn-primary" disabled>Allready sended</button>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No received prescriptions found.</p>
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
