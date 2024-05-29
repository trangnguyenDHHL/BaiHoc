@extends('layout.master');
@section('Content')
@if(session('Note'))
<div class="alert alert-success">
    {{session('Note')}}

</div>
@endif
<form action="insertSupplier" method="post" enctype="multipart/form-data">

    <div>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input
                type="text"
                class="form-control"
                name="id"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Tel</label>
            <input
                type="text"
                class="form-control"
                name="tel"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Select Province</label> <br>
            <select
                class="form-select form-select-lg"
                name="selectProvince"
                id=""
            >
                <option selected>Select one</option>
                <option value="Tinnitus Relief">Tinnitus Relief</option>
                <option value="Aralast">Aralast</option>
                <option value="Kay">Kay</option>
                <option value="EPOGEN">EPOGEN</option>
                <option value="Assured">Assured</option>
            </select>

        
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-info" name="btInsert">Insert</button>
    </div>
</form>
@endsection