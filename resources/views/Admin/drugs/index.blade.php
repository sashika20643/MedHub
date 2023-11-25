<x-app-layout>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="d-flex align-items-end justify-content-end mb-2" > <a href="{{route('admin.drugs.create')}}" class="btn btn-primary" style="width: fit-content"> Add a Drug </a>  </div>
                <div class="card">
                    <div class="card-header">
                        All Drugs
                    </div>
                    <div class="card-body">
                        @if(count($drugs) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($drugs as $drug)
                                        <tr>
                                            <td>{{ $drug->name }}</td>
                                            <td>{{ $drug->price }}</td>
                                            <td>{{ $drug->quantity }}</td>
                                            <td>
                                                <form method="post" action="{{ route('drugs.destroy', $drug->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No drugs found.</p>
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
