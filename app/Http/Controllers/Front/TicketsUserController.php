<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketsUserController extends Controller
{
   public function Ticket(){
       return view('frontend.TicketUser.tickets');
   }

   public function NewTicket(){
    return view('frontend.TicketUser.newticket');
}
}
