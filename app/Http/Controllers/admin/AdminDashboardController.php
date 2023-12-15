<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminDashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Hitung total booking
    $totalBookings = Booking::count();

    // Hitung booking hari ini
    $bookingsTodayCount = Booking::whereDate('created_at', Carbon::today())->count();
    $bookings30DaysAgoCount = Booking::whereDate('created_at', Carbon::today()->subDays(30))->count();

    // Hitung booking minggu ini
    $bookingsThisWeekCount = Booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()])->count();

    // Hitung booking bulan ini
    $bookingsThisMonthCount = Booking::whereMonth('created_at', Carbon::now()->month)->count();
    $bookingsLastMonthCount = Booking::whereMonth('created_at', Carbon::now()->subMonthNoOverflow()->month)->count();

    // Kirim data ke view
    $data = [
      'totalBookings' => $totalBookings,
      'bookingsToday' => [
        'count' => $bookingsTodayCount,
      ],
      'bookingsThisWeek' => [
        'count' => $bookingsThisWeekCount,
      ],
      'bookingsThisMonth' => [
        'count' => $bookingsThisMonthCount,
      ],
    ];

    return view('admin.dashboard', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
  }
}
