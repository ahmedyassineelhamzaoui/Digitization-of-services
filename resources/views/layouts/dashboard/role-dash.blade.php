@extends('layouts.dashboard.common-dash')

@section('title', 'utilisateur')
@section('button-name','Ajouter Rôle')
@section('content')
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom du Rôle</th>
                <th scope="col">Permissions</th>
                <th scope="col">Action</th>
              </tr>
        </thead>
        <tbody class="">
            @foreach ($roles as $item)                
            <tr>
                <th class="align-middle" scope="row">{{$item->id}}</th>
                <td class="align-middle">{{$item->name}}</td>
                <td>
                    @foreach ($item->permissions as $permission)
                       <button class="btn btn-success mt-2">{{ $permission->name }}</button>
                    @endforeach
                </td>
                <th>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-danger  me-1">
                            <i class="fa-regular fa-trash-can "></i>
                        </button>
                        <button class="btn btn-warning ">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </button>
                    </div>
                </th>
              </tr>
            @endforeach
        </tbody>
    </table>
@endsection