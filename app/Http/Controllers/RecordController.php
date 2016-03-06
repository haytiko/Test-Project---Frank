<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Http\Requests\RecordCreateRequest;
use App\Record;
use App\User;
use Illuminate\Http\Request;
use Input;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RecordController extends Controller
{
    public function __construct()
    {
        $user = User::find(1);

        Auth::login($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();

        return view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contests_list = Contest::lists('name', 'id');

        return view('records.create', compact('contests_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RecordCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordCreateRequest $request)
    {
        $input = $request->all();

        $input['image_path'] = $this->uploadPhoto($input['image_path'])->getFilename();

        $record = Auth::user()->records()->create($input);

        session()->flash('flash_message', 'Your article has been created');

        return redirect('records');
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
    public function edit($id)
    {
        $record = Record::findOrFail($id);

        $contests_list = Contest::lists('name', 'id');

        return view('records.edit', compact('record', 'contests_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Record::findOrFail($id);

        $input = $request->all();

        $input['image_path'] = $this->uploadPhoto($input['image_path'])->getFilename();

        $record->update($input);
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

    public function delete()
    {
        $record = Record::findOrFail(Input::get('id'));

        return response()->json(['response' => $record->delete()]);
    }

    public function uploadPhoto(UploadedFile $file)
    {
        $destination_path = public_path().'/uploads/';

        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
        $random = str_random(12);

        $extension = $file->getClientOriginalExtension();

        $filename = $random . "." . $extension;

        return $file->move($destination_path, $filename);
    }
}
