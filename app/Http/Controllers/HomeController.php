<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketCollection;
use App\Http\Resources\TicketResource;
use App\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tickets = auth()->user()->tickets()->paginate(10);
        $tickets_resource = TicketResource::collection($tickets);
        $data = (object)[
            'tickets' => json_decode($tickets_resource->toJson()),
            'links' => $tickets->links()
        ];
        return view('user.tickets.index')->with('data', $data);
//        return $tickets;
    }
}
