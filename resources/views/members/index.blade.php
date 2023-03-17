@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="d-flex flex-column gap-4">
                            <form class="d-flex" method="GET" action="{{ url('members') }}">
                                <label for="country">Search by Country:</label>
                                <input class="form-control me-1" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                        <hr>
                        <h3>All members</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="4">
                                    <a class="btn btn-warning float-end" href="{{ url('members/add') }}">Add Members</a>
                                </th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>School</th>
                                <th>Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($members as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->school }}</td>
                                    <td>{{ $member->country }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Results Found!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $members->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
