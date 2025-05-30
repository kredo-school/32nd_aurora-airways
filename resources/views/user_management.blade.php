@extends('layouts.template')

@section('title', 'User Managemen')

@section('content')

<div class="py-0 flight-bg d-flex align-items-center justify-content-center">
    <div class="bg-white rounded shadow p-5 user-manage-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-users fa-lg mr-2 icon-plane"></i>
                <h1 class="fw-bold mb-0">Manage Users</h1>
            </div>
            {{-- ユーザー追加ボタン（必要に応じて使用） --}}
            <a href="{{ route('admin.users.create') }}" class="btn rounded-pill add-user-btn text-white">
                <i class="fa fa-plus me-1"></i> Add User
            </a>
        </div>

        @if(count($users) > 0)
            @foreach ($users as $user)
                 <div class="flight-item d-flex align-items-center py-3 border-bottom">
                    <div class="text-start name-width">
                        {{ $user->full_name }}
                    </div>
                     <div class="flex-grow-1 text-start">
                        {{ $user->email }}
                    </div>
                     <div class="flex-grow-1 text-start">
                        Joined:{{ $user->created_at->format('Y/m/d') }}
                    </div>
               <div class="me-5">
                     <form action="{{ route('admin.users.toggleVisibility', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-link p-0 m-0">
                @if($user->is_active)
                    <i class="fa-solid fa-eye text-success"></i>
                @else
                    <i class="fa-solid fa-eye-slash text-danger"></i>
                @endif
            </button>
        </form>
               </div>

                    {{-- 管理ボタン --}}
                    <div>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn rounded-pill manage-user-btn text-white">
                        Manage
                    </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center mt-3">
                <p>No users found.</p>
            </div>
        @endif
    </div>
</div>

@endsection
