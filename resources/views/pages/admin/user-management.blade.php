@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="row mt-4 mx-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Users</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Create Date</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>
                  <div class="d-flex px-3 py-1">
                    <div>
                      <img src="./img/team-1.jpg" class="avatar me-3" alt="image">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$user->username}}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-sm font-weight-bold mb-0">{{$user->username === "admin" ? "Admin" : "Member"}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p class="text-sm font-weight-bold mb-0">{{$user->created_at ?? '-'}}</p>
                </td>
                <td class="align-middle text-end">
                  <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                    <button class="btn btn-light mx-2 font-weight-bold mb-0">Edit</button>
                    <button class="btn btn-light mx-2 font-weight-bold mb-0">Delete</button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection