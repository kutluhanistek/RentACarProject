<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(){
        $tickets = Ticket::all();
        return view('admin.pages.tickets', compact('tickets'));
    }

    public function deleteTicket($id){
        $ticket = Ticket::where('id', $id)->first();
        $ticket->delete();
        return redirect()->route('admin_ticket');
    }
}
