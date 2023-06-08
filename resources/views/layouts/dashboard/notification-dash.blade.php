@extends('layouts.dashboard.common-dash')

@section('title', 'Notifications')

@section('content')
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="mr-3">Success!</strong>{{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!  </strong>  {{session('error')}}
        <button type="button" class="btn-close border-1 border-dark" data-bs-dismiss="alert" aria-label="Close"></button>
        </button>
    </div>
    @endif
    <div class="table-responsive">
        @if (count($notifications) > 0)
        <ul>
            @foreach ($notifications as $notification)
            <div class="w-full mt-2 d-flex align-items-center justify-content-between rounded-lg bg-gray-200 border-gray-300 py-3 px-4">
                <div>
                    <div class="d-flex align-items-center">
                        <img style="width:40px;height:40px"  src="assets/images/{{$notification->data['picture']}}" alt="picture">
                        <div class="d-flex align-items-center ">
                            <div> <p>{{ $notification->data['user'] }} {{ $notification->data['title'] }}                                 <a class="text-blue-600 ml-2" href="{{ $notification->data['link'] }}">voir les {{ $notification->data['pages'] }}</a>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <i data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="deleteNotification('{{$notification->id}}')" class="fs-4 text-danger cursor-pointer fa-solid fa-trash-can"></i>
                </div>
            </div>
            
            @endforeach
        </ul>
    @else
        <p>Aucune notification à afficher.</p>
    @endif
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Voulez-vous vraiment supprimer cette notification ?
        </div>
        <div class="modal-footer">
            <form method="post" action="{{route('delete.notification')}}">
                @csrf
                @method('delete')
                <input type="hidden" name="notification_deletedId" id="notification_deletedId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>
                <button id="decline-deleteNotification" type="submit" name="delete-category" class="btn btn-danger">Supprimer</button>
            </form>
    
        </div>
      </div>
    </div>
  </div>
@endsection