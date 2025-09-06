@extends('admin.admin-layout')

@section('content')
    <!-- Header -->
    <div class="header">
        <div class="welcome-text">
            <h2>Welcome, Admin Dashboard</h2>
            <p>Welcome back, {{ Auth::guard('admin')->user()->name }}!</p>
        </div>
        <div class="user-menu">
            <div class="user-info">
                <div class="user-name">{{ Auth::guard('admin')->user()->name }}</div>
                <div class="user-role">Administrator</div>
            </div>
            <div class="user-avatar">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::guard('admin')->user()->name) }}&background=2c3e50&color=fff" width="40" height="40" class="rounded-circle">
            </div>
        </div>
    </div>
@endsection