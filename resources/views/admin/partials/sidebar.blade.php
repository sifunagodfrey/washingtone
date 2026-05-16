<div class="p-3 d-flex flex-column" style="min-height:100vh; background:#1a1a2e;">

    {{-- Logo --}}
    <div class="text-center py-3 mb-2 border-bottom border-secondary">
        <img src="{{ asset('images/washingtone-oruko-logo.png') }}" height="30" class="bg-white p-1 rounded"
            alt="Logo">
        <p class="text-white-50 small mt-2 mb-0">Admin Panel</p>
    </div>

    <ul class="nav flex-column gap-1 mt-3 flex-grow-1">

        {{-- DASHBOARD --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-pie fa-fw"></i> Dashboard
            </a>
        </li>

        <div class="sidebar-section">Content</div>

        {{-- SERVICES --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                href="{{ route('admin.services.index') }}">
                <i class="fas fa-briefcase fa-fw"></i> Services
            </a>
        </li>

        {{-- RATE CARD --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.rate-card.*') ? 'active' : '' }}"
                href="{{ route('admin.rate-card.index') }}">
                <i class="fas fa-tags fa-fw"></i> Rate Card
            </a>
        </li>

        {{-- GALLERY --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"
                href="{{ route('admin.gallery.index') }}">
                <i class="fas fa-images fa-fw"></i> Gallery
            </a>
        </li>

        {{-- VIDEOS --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}"
                href="{{ route('admin.videos.index') }}">
                <i class="fab fa-youtube fa-fw"></i> Videos
            </a>
        </li>

        <div class="sidebar-section">Store & Orders</div>

        {{-- STORE --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.store.*') ? 'active' : '' }}"
                href="{{ route('admin.store.index') }}">
                <i class="fas fa-book fa-fw"></i> My Book / Store
            </a>
        </li>

        {{-- ORDERS --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
                href="{{ route('admin.orders.index') }}">
                <i class="fas fa-shopping-bag fa-fw"></i> Orders
                @php $pending = \App\Models\Order::where('status','pending')->count(); @endphp
                @if ($pending > 0)
                    <span class="badge bg-warning text-dark ms-auto">{{ $pending }}</span>
                @endif
            </a>
        </li>

        <div class="sidebar-section">Blog</div>

        {{-- BLOGS --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"
                href="{{ route('admin.blogs.index') }}">
                <i class="fas fa-pen-nib fa-fw"></i> Blog Posts
            </a>
        </li>

        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}"
                href="{{ route('admin.blog-categories.index') }}">
                <i class="fas fa-folder fa-fw"></i> Blog Categories
            </a>
        </li>

        <div class="sidebar-section">Pages & Settings</div>

        {{-- PAGE CONTENT --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.page-content.*') ? 'active' : '' }}"
                href="{{ route('admin.page-content.index') }}">
                <i class="fas fa-file-alt fa-fw"></i> Page Content
            </a>
        </li>

        {{-- MESSAGES --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}"
                href="{{ route('admin.contact-messages.index') }}">
                <i class="fas fa-envelope fa-fw"></i> Messages
                @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                @if ($unread > 0)
                    <span class="badge bg-danger ms-auto">{{ $unread }}</span>
                @endif
            </a>
        </li>

        {{-- USERS --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                href="{{ route('admin.users.index') }}">
                <i class="fas fa-users fa-fw"></i> Users
            </a>
        </li>

        {{-- SETTINGS --}}
        <li>
            <a class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cog fa-fw"></i> Settings
            </a>
        </li>

    </ul>

    {{-- Logout --}}
    <div class="pt-3 border-top border-secondary mt-3">
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link mb-2">
            <i class="fas fa-external-link-alt fa-fw"></i> View Website
        </a>
        <form method="POST" action="{{ route('logout') }}">@csrf
            <button type="submit" class="btn btn-outline-danger w-100 btn-sm rounded-pill">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>
    </div>

</div>
