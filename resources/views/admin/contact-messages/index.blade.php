@extends('admin.layouts.app')
@section('title','Messages | Admin')
@section('content')
<div class="mb-4"><h4 class="fw-bold text-primary mb-0">Contact Messages</h4></div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card border-0 shadow-sm"><div class="card-body p-0">
<table class="table table-hover align-middle mb-0 small">
    <thead class="table-light"><tr><th></th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th><th>Actions</th></tr></thead>
    <tbody>
    @forelse($messages as $msg)
    <tr class="{{ !$msg->is_read ? 'fw-bold table-warning' : '' }}">
        <td>@if(!$msg->is_read)<span class="badge bg-danger">New</span>@else<span class="badge bg-secondary">Read</span>@endif</td>
        <td>{{ $msg->name }}</td>
        <td>{{ $msg->email }}</td>
        <td>{{ $msg->subject ?? '—' }}</td>
        <td>{{ Str::limit($msg->message, 55) }}</td>
        <td>{{ $msg->created_at->format('d M Y') }}</td>
        <td class="d-flex gap-2">
            <a href="{{ route('admin.contact-messages.show', $msg->id) }}" class="btn btn-primary btn-sm">Read</a>
            <form action="{{ route('admin.contact-messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Del</button></form>
        </td>
    </tr>
    @empty
    <tr><td colspan="7" class="text-center py-4 text-muted">No messages yet.</td></tr>
    @endforelse
    </tbody>
</table></div></div>
<div class="mt-3">{{ $messages->links() }}</div>
@endsection
