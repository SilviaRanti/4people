<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPembayaranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // Hitung total pembayaran
    $totalPayments = Pembayaran::count();
    $totalRevenue = Pembayaran::where('status', 'PAID')->sum('harga');

    $pembayaran = Pembayaran::with('booking', 'service')->get();
    // Hitung pembayaran hari ini
    $paymentsTodayCount = Pembayaran::whereDate('created_at', Carbon::today())->count();

    // Hitung pembayaran minggu ini
    $paymentsThisWeekCount = Pembayaran::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()])->count();

    // Hitung pembayaran bulan ini
    $paymentsThisMonthCount = Pembayaran::whereMonth('created_at', Carbon::now()->month)->count();

    // Kirim data ke view
    $data = [
      'totalPayments' => $totalPayments,
      'paymentsToday' => [
        'count' => $paymentsTodayCount,
      ],
      'paymentsThisWeek' => [
        'count' => $paymentsThisWeekCount,
      ],
      'paymentsThisMonth' => [
        'count' => $paymentsThisMonthCount,
      ],
      'pembayaran' => $pembayaran,
      'totalPembayaran' => $totalRevenue
    ];

    return view('admin.pembayaran.index', compact('data'));
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
    $validator = Validator::make($request->all(), [
      'status' => 'required|string',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $pembayaran = Pembayaran::findOrFail($id);
      $pembayaran->status = $request->input('status');
      $pembayaran->save();

      toastr()->newestOnTop(true)->addSuccess('Status pembayaran berhasil diubah');
      return redirect()->back();
    } catch (\Throwable $th) {
      toastr()->newestOnTop(true)->addError('Gagal ubah status pembayaran');
      return redirect()->back();
    }
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
