@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 py-4">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        Users
                        <button class="btn btn-primary ms-auto" onclick="livewire.emitTo('user-crud', 'create')">
                            New User
                        </button>
                    </div>

                    <div class="card-body">
                        <livewire:users-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <livewire:user-crud />
@endsection
