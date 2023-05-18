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
                        <button class="btn">
                            <i class="fa-regular fa-trash-can text-danger"></i>
                        </button>
                        <button class="btn">
                            <i class="fa-solid fa-pen-to-square text-success"></i>
                        </button>
                    </div>
                </th>
              </tr>
            @endforeach
        </tbody>
    </table>
@endsection