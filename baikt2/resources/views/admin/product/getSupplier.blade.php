@extends('layout.master')
@section('Content')

   
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Tel</th>
                    <th class="text-center">Province</th>
                    <th class="text-center">TaxCode</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($supplier as $supplier)
                <tr>
                    <td class="text-left">{{$supplier->id}}</td>
                    <td class="text-left">{{$supplier->name}}</td>
                    <td class="text-left">{{$supplier->tel}}</td>
                    <td class="text-left">{{$supplier->province}}</td>
                    <td class="text-left">{{$supplier->taxcode}}</td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i>
                    <a href="deleteSupplier/{{$supplier->id}}">Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i>
                    <a href="updateSupplier/{{$supplier->id}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
@endsection