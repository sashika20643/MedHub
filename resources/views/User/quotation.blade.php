<x-app-layout>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">
<div class="container">
    <div class="text-right">
        @if ($quotation->status=="pending")
        <a href="{{route('user.quotation.approve',$quotation->id)}}" class="btn btn-primary">Approve</a>
        <a href="{{route('user.quotation.reject',$quotation->id)}}" class="btn btn-danger">Reject</a>
        @elseif($quotation->status=="rejected")
        <button  class="btn btn-outline-danger">Rejected</button>
        <a href="{{route('user.quotation.approve',$quotation->id)}}" class="btn btn-primary">Approve</a>


        @else
            <button  class="btn btn-outline-primary">Approved</button>
            <a href="{{route('user.quotation.reject',$quotation->id)}}" class="btn btn-danger">Reject</a>

        @endif


        </div>

    {!! $quotation->quotation !!}

    <div class="d-flex justify-content-center align-items-center"> <a href="{{route('user.prescriptions')}}" class="btn btn-primary">Go back</a></div>
</div>


            </div>
        </div>
        </div>
        </x-app-layout>
