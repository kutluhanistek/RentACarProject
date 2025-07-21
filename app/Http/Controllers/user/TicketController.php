<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('user.tickets');
    }

    public function sendTicket(Request $request){
        $ticket = new Ticket();
        $userId = session('user_id');
        $ticket->musteri_id = $userId;
        $ticket->category = $request->category;
        $ticket->sikayet = $request->ticket;
        $ticket->save();
        return redirect()->route('user_ticket');
    }
}
