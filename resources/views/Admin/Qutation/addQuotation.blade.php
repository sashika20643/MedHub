<x-app-layout>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div style="width:100vw; padding:5px;">

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Please check the form and try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="main-image mb-2">
                <img  id="mainPrescriptionImage" src="{{ asset('storage/' . $prescription->mainImage()->path) }}"  alt="Prescription Image">

            </div>
            <div class="d-flex align-items-even">
                @foreach($prescription->images as $image)
                    <img class="thumbnail mr-2" style="max-width: 50px;" src="{{ asset('storage/' . $image->path) }}" alt="Prescription Thumbnail" onclick="changeMainImage('{{ asset('storage/' . $image->path) }}')">
                @endforeach
            </div>
        </div>


        <div class="col-md-8">

            <div class="sample-quotation p-2"  id="sample-quotation" style="min-height: 30vh; background-color:rgb(202, 202, 202,.6)" >
                <h2 class="text-center">Quotation</h2>
                <table id="quotationTable"  class="table">
                    <thead>
                        <tr>
                            <th>Drug</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="quotationTableBody">

                    </tbody>
                </table>
                <div id="nettotal">

                </div>
            </div>

            <div class="add-drugs mt-3">
                <h2 class="text-center">Add Drugs to Quotation</h2>

                <form id="addDrugsForm" class="text-right">
                    <div class="form-group mb-2">
                    <select name="drug" class="form-control" id="drug">
@foreach ($drugs as $drug )
<option value="{{$drug->name}}" data-price="{{ $drug->price }}" >{{$drug->name}}</option>

@endforeach
                    </select>
                    </div>


                  <div class="form-group mb-2">
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" min="1"  >
                  </div>
                    <br>


                    <button type="button" class="btn btn-primary" onclick="addDrugToQuotation()">Add to Quotation</button>
                </form>
            </div>
            <div>
                <form action="{{ route('admin.store-quotation') }}" class="text-right mt-3" method="POST" id="qform">
                    @csrf
                    <input type="text" id="quotation" hidden name="quotation">
<input type="text" name='id' hidden  value="{{$prescription->id}}">
                    <button class="btn btn-success" onclick="sendQuotation()" type="button">Send Quotation</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>

    var nettotal=0;
    function changeMainImage(imagePath) {
        document.getElementById('mainPrescriptionImage').src = imagePath;
    }

    function addDrugToQuotation() {
    var selectedDrug = document.getElementById('drug').value;
    var quantity = document.getElementById('quantity').value;
    if( quantity<=0){
        alert('Invalid quantity');
        return;
    }

    var price = parseFloat(document.getElementById('drug').options[document.getElementById('drug').selectedIndex].dataset.price);
    var total = price * quantity;
nettotal+=total;
    var quotationTable = document.querySelector('.sample-quotation table');

    quotationTable.querySelector('tbody').innerHTML += `
        <tr>
            <td>${selectedDrug}</td>
            <td>${quantity}</td>
            <td>${total.toFixed(2)}</td>
        </tr>
    `;
document.getElementById('nettotal').innerHTML=`<h3 class="text-right">Total : <span class="text-primary"> ${nettotal} </span></h3>`
    document.getElementById('drug').value = '';
    document.getElementById('quantity').value = '';
}

function sendQuotation(){
var quotation= document.getElementById('sample-quotation').innerHTML;
document.getElementById('quotation').value=quotation;
document.getElementById("qform").submit();
// console.log(quotation);
}

</script>


</div>
</div>
</div>
</x-app-layout>
