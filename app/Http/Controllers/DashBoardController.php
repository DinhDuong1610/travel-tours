<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Checkout;
use App\Models\Destinations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $destinations = Destinations::count();
        $blogs = Blog::count();
        $checkouts = Checkout::where('status', 'approved')->count();

        // Lấy số lượng đơn đặt tours theo tháng
        $monthlyCheckouts = Checkout::where('status', 'approved')
            ->select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month', 'asc')
            ->get();


        $monthlyCheckoutData = [];
        foreach ($monthlyCheckouts as $checkout) {
            $monthlyCheckoutData[$checkout->month] = $checkout->count;
        }

        $monthlyCheckoutData = array_replace(array_flip(range(1, 12)), $monthlyCheckoutData);

        foreach ($monthlyCheckoutData as $month => $count) {
            if (!isset($monthlyCheckoutData[$month])) {
                $monthlyCheckoutData[$month] = 0;
            }
        }

        $data = [
            'users' => $users,
            'destinations' => $destinations,
            'blogs' => $blogs,
            'checkouts' => $checkouts,
            'monthlyCheckoutData' => $monthlyCheckoutData
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}
