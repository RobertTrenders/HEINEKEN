<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRequest;
use App\Models\ParticipantModel;

class ParticipantController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend/participant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRequest $request)
    {
        $oParticipant = new ParticipantModel();

        $oParticipant->name = $request['name'];
        $oParticipant->last_name = $request['last_name'];
        $oParticipant->dni = $request['dni'];
        $oParticipant->phone = $request['phone'];
        $oParticipant->team = $request['team'];
        $oParticipant->objective = $request['objective'];

        $oParticipant->save();

        return view('frontend/participant.thanks');
    }
}
