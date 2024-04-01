<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pembayaran;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Xendit\Xendit;

class UserBookingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
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
  // public function store(Request $request)
  // {
  //   $validator = Validator::make($request->all(), [
  //     'nama' => 'required|string|max:255',
  //     'whatsapp' => 'required|string|max:20',
  //     'tanggal_booking' => 'required|date_format:m/d/Y',
  //     'jam_booking' => 'required|date_format:H:i',
  //     'id_service' => 'required|exists:services,id',
  //   ], [
  //     'nama.required' => 'Isikan nama kamu!',
  //     'whatsapp.required' => 'Isikan whatsapp kamu!',
  //     'tanggal_booking.required' => 'Isikan tanggal booking kamu!',
  //     'jam_booking.required' => 'Isikan jam booking kamu!',
  //   ]);


  //   if ($validator->fails()) {
  //     $errors = $validator->errors()->all();
  //     foreach ($errors as $error) {
  //       toastr()->newestOnTop(true)->addError($error);
  //     }
  //     return redirect()->back()->withErrors($validator)->withInput();
  //   }

  //   $tanggal_booking = Carbon::createFromFormat('m/d/Y', $request->tanggal_booking)->format('Y-m-d');
  //   try {
  //     $booking = Booking::create([
  //       'pembooking' => $request->input('nama'),
  //       'no_hp' => $request->input('whatsapp'),
  //       'tanggal_booking' => $tanggal_booking,
  //       'jam_booking' => $request->input('jam_booking'),
  //       'id_service' => $request->input('id_service'),
  //     ]);

  //     $service = Services::findOrFail($booking->id_service);

  //     // Set Xendit API Key
  //     Xendit::setApiKey(env('XENDIT_DEMO_SECRET_KEY'));

  //     $params = [
  //       'external_id' => 'booking_' . $booking->id . '_' . date('Ymd'),
  //       'description' => 'Payment for ' . $service->nama,
  //       'amount' => $service->harga
  //     ];

  //     // Create an invoice
  //     $invoice = \Xendit\Invoice::create($params);

  //     // Store payment details in your database
  //     Pembayaran::create([
  //       'nama' => $booking->pembooking,
  //       'harga' => $service->harga,
  //       'status' => 'PENDING',
  //       'id_service' => $booking->id_service,
  //       'id_booking' => $booking->id,
  //       'external_id' => $params['external_id']
  //     ]);

  //     // Redirect user to the invoice URL or return it as a JSON response
  //     return redirect($invoice['invoice_url']);
  //   } catch (\Throwable $th) {
  //     return throw $th;
  //     toastr()->newestOnTop(true)->addError('Gagal tambah data booking!');
  //     return redirect()->back();
  //   }
  // }

  // hanya 1 booking di jam itu
  public function store(Request $request)
  {
    // Validation rules for booking
    $validator = Validator::make($request->all(), [
      'nama' => 'required|string|max:255',
      'whatsapp' => 'required|string|max:20',
      'tanggal_booking' => 'required|date_format:m/d/Y',
      'jam_booking' => 'required|date_format:H:i',
      'id_service' => 'required|exists:services,id',
    ], [
      'nama.required' => 'Isikan nama kamu!',
      'whatsapp.required' => 'Isikan whatsapp kamu!',
      'tanggal_booking.required' => 'Isikan tanggal booking kamu!',
      'jam_booking.required' => 'Isikan jam booking kamu!',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    // Convert the date to Y-m-d format
    $tanggal_booking = Carbon::createFromFormat('m/d/Y', $request->tanggal_booking)->format('Y-m-d');

    // Check for existing booking
    $existingBooking = Booking::where('tanggal_booking', $tanggal_booking)
      ->where('jam_booking', $request->jam_booking)
      ->exists();

    if ($existingBooking) {
      toastr()->newestOnTop(true)->addError('
      Someone has already booked, look for other times or dates 🙏');
      return redirect()->back()->withInput();
    }

    try {
      $booking = Booking::create([
        'pembooking' => $request->input('nama'),
        'no_hp' => $request->input('whatsapp'),
        'tanggal_booking' => $tanggal_booking,
        'jam_booking' => $request->input('jam_booking'),
        'id_service' => $request->input('id_service'),
      ]);

      $service = Services::findOrFail($booking->id_service);

      // Set Xendit API Key
      Xendit::setApiKey(env('XENDIT_DEMO_SECRET_KEY'));

      $params = [
        'external_id' => 'booking_' . $booking->id . '_' . date('Ymd'),
        'description' => 'Payment for ' . $service->nama,
        'amount' => $service->harga
      ];

      // Create an invoice
      $invoice = \Xendit\Invoice::create($params);

      // Store payment details in your database
      Pembayaran::create([
        'nama' => $booking->pembooking,
        'harga' => $service->harga,
        'status' => 'PENDING',
        'id_service' => $booking->id_service,
        'id_booking' => $booking->id,
        'external_id' => $params['external_id']
      ]);

      // Redirect user to the invoice URL or return it as a JSON response
      return redirect($invoice['invoice_url']);
    } catch (\Throwable $th) {
      // Note: It's not a good practice to expose detailed error information like this
      // In production, consider logging the error and showing a generic error message to the user
      toastr()->newestOnTop(true)->addError('Failed to add booking data!');
      return redirect()->back()->withInput();
    }
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

  public function xenditWebhook(Request $request)
  {
    $event = $request->all();
    // Handle the event
    if ($event['status'] === 'PAID') {
      $pembayaran = Pembayaran::where('external_id', $event['external_id'])->first();
      if ($pembayaran) {
        $pembayaran->status = 'PAID';
        $pembayaran->save();
      }
    }

    return response()->json(['message' => 'Webhook received']);
  }
}
