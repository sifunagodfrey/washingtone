@extends('admin.layouts.app')
@section('title', 'Dashboard | Admin')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold text-primary mb-0">Dashboard</h4>
    <small class="text-muted">Washingtone Oruko Portfolio — Admin Overview</small>
</div>

{{-- Stats Cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="{{ route('admin.services.index') }}" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary rounded p-3"><i class="fas fa-briefcase text-white fa-lg"></i></div>
                    <div><p class="text-muted small mb-0">Services</p><h4 class="fw-bold mb-0 text-primary">{{ $servicesCount }}</h4></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning rounded p-3"><i class="fas fa-shopping-bag text-dark fa-lg"></i></div>
                    <div>
                        <p class="text-muted small mb-0">Orders</p>
                        <h4 class="fw-bold mb-0 text-primary">{{ $ordersCount }}
                        @if($pendingOrders > 0)<span class="badge bg-warning text-dark ms-1" style="font-size:.7rem;">{{ $pendingOrders }} new</span>@endif
                        </h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="{{ route('admin.contact-messages.index') }}" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-danger rounded p-3"><i class="fas fa-envelope text-white fa-lg"></i></div>
                    <div>
                        <p class="text-muted small mb-0">Messages</p>
                        <h4 class="fw-bold mb-0 text-primary">{{ $unreadMessages }}
                        @if($unreadMessages > 0)<span class="badge bg-danger ms-1" style="font-size:.7rem;">unread</span>@endif
                        </h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success rounded p-3"><i class="fas fa-pen-nib text-white fa-lg"></i></div>
                    <div><p class="text-muted small mb-0">Blogs</p><h4 class="fw-bold mb-0 text-primary">{{ $blogsCount }}</h4></div>
                </div>
            </a>
        </div>
    </div>
</div>

{{-- Second row --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="{{ route('admin.gallery.index') }}" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-info rounded p-3"><i class="fas fa-images text-white fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Gallery</p><h4 class="fw-bold mb-0 text-primary">{{ $galleryCount }}</h4></div>
            </div></a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="{{ route('admin.videos.index') }}" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger rounded p-3"><i class="fab fa-youtube text-white fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Videos</p><h4 class="fw-bold mb-0 text-primary">{{ $videosCount }}</h4></div>
            </div></a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="{{ route('admin.store.index') }}" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary rounded p-3"><i class="fas fa-book text-white fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Products</p><h4 class="fw-bold mb-0 text-primary">Store</h4></div>
            </div></a>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm"><a href="{{ route('admin.rate-card.index') }}" class="text-decoration-none">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-warning rounded p-3"><i class="fas fa-tags text-dark fa-lg"></i></div>
                <div><p class="text-muted small mb-0">Rate Card</p><h4 class="fw-bold mb-0 text-primary">Packages</h4></div>
            </div></a>
        </div>
    </div>
</div>

{{-- Recent Orders + Messages --}}
<div class="row g-3">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between align-items-center">
                <span><i class="fas fa-shopping-bag text-primary me-2"></i>Recent Orders</span>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle small">
                    <thead class="table-light"><tr><th>Order #</th><th>Customer</th><th>Amount</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr>
                            <td><a href="{{ route('admin.orders.show', $order->id) }}" class="text-primary fw-semibold">{{ $order->order_number }}</a></td>
                            <td>{{ $order->customer_name }}<br><small class="text-muted">{{ $order->payment_method }}</small></td>
                            <td>KES {{ number_format($order->total_amount) }}</td>
                            <td><span class="badge bg-{{ $order->status_badge }}">{{ ucfirst($order->status) }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-3 text-muted">No orders yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between align-items-center">
                <span><i class="fas fa-envelope text-danger me-2"></i>Unread Messages</span>
                <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>
            <div class="list-group list-group-flush">
                @forelse($recentMessages as $msg)
                <a href="{{ route('admin.contact-messages.show', $msg->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <strong class="small">{{ $msg->name }}</strong>
                        <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="small text-muted mb-0">{{ Str::limit($msg->message, 60) }}</p>
                </a>
                @empty
                <div class="list-group-item text-center text-muted py-3">No unread messages.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="card border-0 shadow-sm mt-3">
    <div class="card-header bg-white fw-bold py-3"><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</div>
    <div class="card-body">
        <div class="row g-2">
            @foreach([
                ['route' => 'admin.services.create',      'label' => '+ Add Service',    'color' => 'primary'],
                ['route' => 'admin.gallery.create',       'label' => '+ Upload Photo',   'color' => 'info'],
                ['route' => 'admin.videos.create',        'label' => '+ Add Video',      'color' => 'danger'],
                ['route' => 'admin.blogs.create',         'label' => '+ Write Blog',     'color' => 'success'],
                ['route' => 'admin.rate-card.create',     'label' => '+ Add Package',    'color' => 'warning'],
                ['route' => 'admin.store.create',         'label' => '+ Add Product',    'color' => 'primary'],
                ['route' => 'admin.page-content.index',   'label' => 'Edit Pages',       'color' => 'secondary'],
                ['route' => 'admin.settings.index',       'label' => 'Settings',         'color' => 'secondary'],
            ] as $action)
            <div class="col-6 col-md-3">
                <a href="{{ route($action['route']) }}" class="btn btn-outline-{{ $action['color'] }} w-100 btn-sm rounded-pill">
                    {{ $action['label'] }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
