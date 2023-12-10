@extends('layout.app')
@section('content')

    <div class="container mt-3">
        <ul class="nav nav-tabs border-success">
            <li class="nav-item">
                <a class="nav-link active" href="#onprocess" data-toggle="tab">On Process</a>
            </li>
            <li class="nav-item border-success">
                <a class="nav-link" href="#ongoing" data-toggle="tab">Ongoing</a>
            </li>
            <li class="nav-item border-success">
                <a class="nav-link" href="#completed" data-toggle="tab">Completed</a>
            </li>
        </ul>
        @if(Session::has('status') && Session::get('status') == 'success')
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="tab-content">
            <div class="tab-pane fade show active" id="onprocess">
                @foreach($proses_reservasi as $pr)
              <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">pemesanan {{$pr -> layanan}} - {{$pr -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$pr -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($pr->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($pr->kepulangan_checkout)) }}</li>
                            </ul>
                            @if($pr -> status == "menunggu konfirmasi admin")
                            <p class="text-danger">Mohon untuk mengkonfirmasi reservasi yang dilakukan oleh user.</p>
                            <a href="/konfirmasi-reservasi/{{$pr -> id}}" class="btn btn-success">Konfirmasi reservasi</a>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- konten untuk tab ongoind -->
            <div class="tab-pane fade" id="ongoing">
                @foreach($proses_reservasi as $pr)
                <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">pemesanan {{$pr -> layanan}} - {{$pr -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$pr -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($pr->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($pr->kepulangan_checkout)) }}</li>
                            </ul>
                            <p class="text-danger">Silahkan lihat detail pemesanan.</p>
                            <a href="/konfirmasi-reservasi/{{$pr -> id}}" class="btn btn-success">Lihat detail pemesanan</a>
                        </div>
                    </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="tab-pane fade" id="completed">
                <!-- Konten untuk tab "Completed" -->
            </div>
        </div>

    </div>
      
@endsection