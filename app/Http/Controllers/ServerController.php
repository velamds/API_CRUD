<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Server;
use App\Http\Resources\Server as ServerResource;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Servers
        $servers = Server::orderBy('created_at','desc')->paginate(5);

        //Return collection of servers as a resource
        return ServerResource::collection($servers);
    }

    public function store(Request $request)
    {
        $server =   $request->isMethod('put') ? 
                    Server::findOrFail($request->server_id) : 
                    new Server;
        $server->id = $request->input('server_id');
        $server->name = $request->input('name');
        $server->specs = $request->input('specs');

        if($server->save())
        {
            return new ServerResource($server);
        }
    }
    public function show($id)
    {
            // Get Server
            $server = Server::findOrFail($id);
            return new ServerResource($server);
    }
}
