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
                            <h3 class="card-title">Pemesanan {{$pr -> layanan}} - {{$pr -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$pr -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($pr->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($pr->kepulangan_checkout)) }}</li>
                            </ul>
                            @if($pr -> status == "menunggu konfirmasi admin")
                            <p class="text-danger">Mohon dicek secara berkala untuk mengetahui cara pembayaran.</p>
                            <a href="#" class="btn btn-success disabled">Lihat cara pembayaran</a>
                            @endif
                            @if($pr -> status != "menunggu konfirmasi admin")
                            <p class="text-danger">Silahkan lihat detail pembayaran untuk melakukan pembayaran.</p>
                            <a href="/pembayaran/{{$pr -> id}}" class="btn btn-success">Lihat cara pembayaran</a> 
                            @endif
                        </div>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- konten untuk tab ongoing -->
            <div class="tab-pane fade" id="ongoing">
                @foreach($proses_konfirmasi as $pk)
                <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Pemesanan {{$pk -> layanan}} - {{$pk  -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$pk -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($pk->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($pk->kepulangan_checkout)) }}</li>
                            </ul>
                            <p class="text-danger">Silahkan lihat tiket untuk mengecek status pembayaran.</p>
                            <a href="/tiket/{{$pk -> id}}" class="btn btn-success">tiket pemesanan</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="tab-pane fade" id="completed">
                @foreach($reservasi_complete as $rc)
                <div class="card mt-3 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{url('asset/front-end/image/traveling.png')}}" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Pemesanan {{$rc -> layanan}} - {{$rc  -> booking_code}}</h3>
                            <ul class="card-text no-bullet fs-5">
                                <li>Destinasi: {{$rc -> keberangkatan}}</li>
                                <li>Tanggal keberangkatan / checkin: {{ date('d F Y', strtotime($rc->keberangkatan_checkin)) }}</li>
                                <li>Tanggal kepulangan / checkout: {{ date('d F Y', strtotime($rc->kepulangan_checkout)) }}</li>
                            </ul>
                            <p class="text-danger">Silahkan lihat tiket untuk mengecek status pembayaran.</p>
                            <a href="/tiket/{{$rc -> id}}" class="btn btn-success">tiket pemesanan</a>
                        </div>
                    </div>
                </div>
              </div>
             @endforeach
            </div>
        </div>
    </div>
      
@endsection