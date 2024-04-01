@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="{{asset('admin/images/dashboard/people.svg')}}" alt="people">
          <div class="weather-info">
            <div class="d-flex">
              <div>
                <h2 id="temperature" class="mb-0 font-weight-normal"></h2>
              </div>
              <div class="ml-2">
                <h4 id="location" class="location font-weight-normal"></h4>
                <h6 id="country" class="font-weight-normal"></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Total Booking</p>
              <p class="fs-30 mb-2">{{ $data['totalBookings'] }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Booking Hari Ini</p>
              <p class="fs-30 mb-2">{{ $data['bookingsToday']['count'] }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Booking Minggu Ini</p>
              <p class="fs-30 mb-2">{{ $data['bookingsThisWeek']['count'] }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Booking Bulan Ini</p>
              <p class="fs-30 mb-2">{{ $data['bookingsThisMonth']['count'] }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div id='calendar'></div>
    </div>
  </div>
</div>

<style>
  .fc-event {
    background-color: #3788d8;
    color: #fff;
    border: 1px solid #357ebd;
    font-weight: bold;
    padding: 2px 5px;
    border-radius: 4px;
  }

  .fc-daygrid-event {
    opacity: 1;
  }

  .fc-daygrid-day-events {
    margin-top: 0;
  }

  .fc-event-title {
    font-size: 0.85em;
    white-space: normal;
  }

  .fc-event:hover {
    background-color: #023020;
  }

  .fc-event-dot {
    display: none;
  }

  .fc-event-time,
  .fc-event-title {
    padding: 0 1px;
  }

  .fc .fc-button-primary {
    color: #333;
    background-color: #fff;
    border-color: #ddd;
  }

  .fc .fc-button-primary:hover {
    color: #333;
    background-color: #eee;
    border-color: #ccc;
  }
</style>
@endsection

@push('script')
<script>
  // Function to fetch weather data
  async function getWeatherData() {
    const apiKey = "{{ env('WEATHER_API_KEY') }}"; // Replace with your actual API key
    const apiUrl = 'https://api.weatherapi.com/v1/current.json'; // Replace with the API URL

    try {
      const response = await fetch(`${apiUrl}?key=${apiKey}&q=Bandar%20Lampung`); // Replace 'Bandar%20Lampung' with the desired location
      const data = await response.json();

      // Update HTML elements with dynamic data
      document.getElementById('temperature').innerText = `${data.current.temp_c}°C`;
      document.getElementById('location').innerText = 'Bandar Lampung';
      document.getElementById('country').innerText = data.location.country;
    } catch (error) {
      console.error('Error fetching weather data:', error);
    }
  }

  // Call the function to fetch and update data
  getWeatherData();
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: {
        url: '/admin/getBookings',
        success: function(content) {
          console.log("Events: ", content);
        },
        failure: function() {
          console.log("Error fetching events");
        }
      },
      eventTimeFormat: {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
      }
    });

    calendar.render();
  });
</script>
@endpush