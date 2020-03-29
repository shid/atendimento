<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\TicketResource;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    public function store(Request $request)
    {
        $data = $request->only(['category_id', 'title', 'description', 'priority']);
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 1;

        Ticket::create($data);

        return Redirect::to('home');
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
    public function edit(Ticket $ticket)
    {
        $categories = Category::all()->sortBy('name');

        $priority = [
            ['id' => 1, 'name' => 'Critical'],
            ['id' => 2, 'name' => 'High'],
            ['id' => 3, 'name' => 'Medium'],
            ['id' => 4, 'name' => 'Low'],
        ];

        $data = (object)[
            'categories' => $categories->toArray(),
            'priority' => $priority,
            'ticket' => $ticket
        ];

        return view('user.tickets.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ticket $ticket, Request $request)
    {
        $data = $request->only(['category_id', 'title', 'description', 'priority']);

        $ticket->update($data);

        return Redirect::to('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function new()
    {
        $categories = Category::all()->sortBy('name');

        $priority = [
            ['id' => 1, 'name' => 'Critical'],
            ['id' => 2, 'name' => 'High'],
            ['id' => 3, 'name' => 'Medium'],
            ['id' => 4, 'name' => 'Low'],
        ];
        $data = (object)[
            'categories' => $categories->toArray(),
            'priority' => $priority
        ];
        return view('user.tickets.new')->with('data', $data);
    }
}
