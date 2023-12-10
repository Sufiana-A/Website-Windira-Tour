<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function myOrder(){
        $proses_reservasi = DB::table('reservations')
                            ->where('email', Auth::user()->email)
                            ->whereNotExists(function ($query) {
                                $query->select(DB::raw(1))
                                    ->from('payments')
                                    ->whereColumn('payments.id_reservation', 'reservations.id');
                            })
                            ->orderByDesc('reservations.created_at')
                            ->get();
        $proses_konfirmasi = DB::table('reservations')
                            ->join('payments', 'reservations.id', '=', 'payments.id_reservation')
                            ->where('reservations.email', Auth::user()->email)
                            ->orderByDesc('payments.created_at')
                            ->get();
        return view('pages.myOrder', compact(['proses_reservasi', 'proses_konfirmasi']));
    }
    public function reservasi_pesawat(){
        return view('pages.reservasi-pesawat');
    }
    public function plane_reservations(Request $request){
        $plane_reservations = Reservation::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'keberangkatan' => $request->keberangkatan,
            'destinasi_hotel' => $request->destinasi_hotel,
            'keberangkatan_checkin' => $request->keberangkatan_checkin,
            'kepulangan_checkout' => $request->kepulangan_checkout,
            'quantity' => $request->quantity,
            'booking_code' => 0000,
            'duduk_kamar' => '',
            'biaya' => null,
            'status' => 'menunggu konfirmasi admin'
        ]);
        if($plane_reservations){
            Session::flash('status', 'success');
            Session::flash('message', 'reservasi kamu berhasil ditambahkan, mohon menunggu konfirmasi dari admin');
            return redirect('/my-order');
        } 
    }
    public function reservasi_kereta(){
        return view('pages.reservasi-kereta');
    }
    public function train_reservations(Request $request){
        $train_reservations = Reservation::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'keberangkatan' => $request->keberangkatan,
            'destinasi_hotel' => $request->destinasi_hotel,
            'keberangkatan_checkin' => $request->keberangkatan_checkin,
            'kepulangan_checkout' => $request->kepulangan_checkout,
            'quantity' => $request->quantity,
            'booking_code' => 0000,
            'duduk_kamar' => '',
            'biaya' => null,
            'status' => 'menunggu konfirmasi admin'
        ]);
        if($train_reservations){
            Session::flash('status', 'success');
            Session::flash('message', 'reservasi kamu berhasil ditambahkan, mohon menunggu konfirmasi dari admin');
            return redirect('/my-order');
        } 
    }
    public function reservasi_hotel(){
        return view('pages.reservasi-hotel');
    }
    public function hotel_reservations(Request $request){
        $hotel_reservations = Reservation::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'layanan' => $request->layanan,
            'keberangkatan' => '',
            'destinasi_hotel' => $request->destinasi_hotel,
            'keberangkatan_checkin' => $request->keberangkatan_checkin,
            'kepulangan_checkout' => $request->kepulangan_checkout,
            'quantity' => $request->quantity,
            'booking_code' => 0000,
            'duduk_kamar' => '',
            'biaya' => null,
            'status' => 'menunggu konfirmasi admin'
        ]);
        if($hotel_reservations){
            Session::flash('status', 'success');
            Session::flash('message', 'reservasi kamu berhasil ditambahkan, mohon menunggu konfirmasi dari admin');
            return redirect('/my-order');
        } 
    }
    public function pembayaran($id){
        $pembayaran = Reservation::find($id);
        return view('pages.pembayaran', compact(['pembayaran']));
    }
    public function payment(Request $request, $id){
        $payment = Reservation::find($id);
        $bukti_pembayaran = $request->file('bukti_pembayaran')->clientExtension();
        $fileBuktiPembayaran = auth()->guard('web')->user()->nama_lengkap.'-'.now()->timestamp.'-'.'bukti pembayaran'.'.'.$bukti_pembayaran;
        $request->file('bukti_pembayaran')->storeAs('images', $fileBuktiPembayaran);
        $request['bukti_pembayaran'] = $fileBuktiPembayaran;
        $create_payments = Payment::create([
            'id_reservation' => $payment->id,
            'bukti_pembayaran' => $fileBuktiPembayaran,
            'status_pembayaran' => 'pending'
        ]);
        if($create_payments){
            Session::flash('status', 'success');
            Session::flash('message', 'Pemmbayaran berhasil di upload');
            return redirect('/my-order');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Pembayaran gagal di upload');
            return redirect('/my-order');
        }
    }
    public function tiket($id){
        $tiket = Payment::find($id);
        return view('pages.tiket', compact(['tiket']));
    }
}
