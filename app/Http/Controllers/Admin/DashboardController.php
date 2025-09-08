<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $admins_count = 0;
        $users_count = 0;
        $orders_count = 0;
        $providers_count = 0;
        $services_count = 0;
        $regoins_count = 0;

        $totalPackages = \App\Models\Packages::count();

        // $topClients = Client::get();

        // $topClients = User::where('is_admin', 0)->count();

        $topClients = User::where('is_admin', 0)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();



        $totalStudents = User::where('is_admin', 0)->count();


        $totalLessons = \App\Models\Videos::count();
        $totalTests = \App\Models\Test::count();
        $totalStory = \App\Models\Story::count();
        
        
        $blogs = \App\Models\Blog::count();

        $clients = User::where('is_admin', 0)
            ->with('level')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.index', get_defined_vars());
    }








    public function landing_cms() {
        $check = auth()->check();
        $admin = auth()->user();
        if ($check && $admin->is_admin == 1) {
            $url = config('landing_dashboard.login_url');
            return redirect($url);
        } else {
            session()->flash('error', TranslationHelper::translate('Unauthorized To Login'));
            return back();
        }
    }


    // public function getTopProgrammesBookings()
    // {
    //     $topProgrammes = ProgrammeBooking::select('programme_id')
    //     ->with('programme:id,name')
    //     ->selectRaw('COUNT(*) as total_bookings')
    //     ->groupBy('programme_id')
    //     ->orderByDesc('total_bookings')
    //     ->take(5)
    //         ->get();

    //     return response()->json($topProgrammes);
    // }
}
