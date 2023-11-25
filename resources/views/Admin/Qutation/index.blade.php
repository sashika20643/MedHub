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
                                    <th>Action</th>
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
                                            <a href="" class="btn btn-primary">Add Quotation</a>
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
