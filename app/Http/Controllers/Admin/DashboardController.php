<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Order;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount       = Service::count();
        $blogsCount          = Blog::count();
        $ordersCount         = Order::count();
        $pendingOrders       = Order::where('status', 'pending')->count();
        $unreadMessages      = ContactMessage::where('is_read', false)->count();
        $galleryCount        = Gallery::count();
        $videosCount         = Video::count();

        $recentOrders   = Order::latest()->take(5)->get();
        $recentMessages = ContactMessage::where('is_read', false)->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'servicesCount',
            'blogsCount',
            'ordersCount',
            'pendingOrders',
            'unreadMessages',
            'galleryCount',
            'videosCount',
            'recentOrders',
            'recentMessages'
        ));
    }
}
