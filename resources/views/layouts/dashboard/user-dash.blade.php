@extends('layouts.dashboard.common-dash')

@section('title', 'utilisateur')

@section('content')
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom complet</th>
                <th scope="col">Email</th>
                <th scope="col">Rôle</th>
                <th scope="col">Action</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)                
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->full_name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->roles[0]->name}}</td>
                <th>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-danger  me-1">
                                <i class="fa-regular fa-trash-can "></i>
                            </button>
                            <button class="btn btn-warning ">
                                <i class="fa-solid fa-pen-to-square "></i>
                            </button>
                        </div>
                    </div>
                </th>
              </tr>
            @endforeach
        </tbody>
    </table>
@endsection