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

class AdminBookingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'bookings' => Booking::with('service')->get(),
      'services'  => Services::all(),
    ];
    return view('admin.booking.index', $data);
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
  //   // Validation rules for booking
  //   $validator = Validator::make($request->all(), [
  //     'pembooking' => 'required|string|max:255',
  //     'no_hp' => 'required|string|max:20',
  //     'tanggal_booking' => 'required|date',
  //     'jam_booking' => 'required|date_format:H:i',
  //     'service' => 'required|exists:services,id',
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
  //     // Create a new booking record
  //     Booking::create([
  //       'pembooking' => $request->input('pembooking'),
  //       'no_hp' => $request->input('no_hp'),
  //       'tanggal_booking' => $tanggal_booking,
  //       'jam_booking' => $request->input('jam_booking'),
  //       'id_service' => $request->input('service'),
  //     ]);

  //     toastr()->newestOnTop(true)->addSuccess('Berhasil tambah data booking');
  //     return redirect()->back();
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
      'pembooking' => 'required|string|max:255',
      'no_hp' => 'required|string|max:20',
      'tanggal_booking' => 'required|date_format:m/d/Y', // Ensure the format matches your input
      'jam_booking' => 'required|date_format:H:i',
      'service' => 'required|exists:services,id',
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
      // Create a new booking record
      Booking::create([
        'pembooking' => $request->input('pembooking'),
        'no_hp' => $request->input('no_hp'),
        'tanggal_booking' => $tanggal_booking,
        'jam_booking' => $request->input('jam_booking'),
        'id_service' => $request->input('service'),
      ]);

      toastr()->newestOnTop(true)->addSuccess('Successfully added booking data');
      return redirect()->back();
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
    // Validation rules for booking
    $validator = Validator::make($request->all(), [
      'pembooking' => 'required|string|max:255',
      'no_hp' => 'required|string|max:20',
      'tanggal_booking' => 'required|date_format:m/d/Y',
      'jam_booking' => 'required|date_format:H:i',
      'service' => 'required|exists:services,id',
    ]);

    if ($validator->fails()) {
      $errors = $validator->errors()->all();
      foreach ($errors as $error) {
        toastr()->newestOnTop(true)->addError($error);
      }
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $booking = Booking::findOrFail($id);
      $booking->pembooking = $request->input('pembooking');
      $booking->no_hp = $request->input('no_hp');
      $booking->tanggal_booking = Carbon::createFromFormat('m/d/Y', $request->input('tanggal_booking'))->format('Y-m-d');
      $booking->jam_booking = $request->input('jam_booking');
      $booking->id_service = $request->input('service');

      $booking->save();

      toastr()->newestOnTop(true)->addSuccess('Booking updated successfully');
      return redirect()->back();
    } catch (\Throwable $th) {
      // Log the error or handle it as per your error handling policy
      toastr()->newestOnTop(true)->addError('Failed to update booking');
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
    try {
      $booking = Booking::findOrFail($id);
      $booking->delete();

      toastr()->newestOnTop(true)->addSuccess('Booking successfully deleted!');
      return redirect()->back();
    } catch (\Throwable $th) {
      // You can log the error or handle it as per your application's error handling policy
      toastr()->newestOnTop(true)->addError('Failed to delete booking!');
      return redirect()->back();
    }
  }

  public function getBookings()
  {
    $bookings = Booking::with('service')->get();
    $events = $bookings->map(function ($booking) {
      return [
        'title' => $booking->pembooking . ' - ' . $booking->service->nama,
        'start' => $booking->tanggal_booking . 'T' . $booking->jam_booking,
      ];
    });
    return response()->json($events);
  }
}
