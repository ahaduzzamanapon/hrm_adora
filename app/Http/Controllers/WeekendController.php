<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeekendRequest;
use App\Http\Requests\UpdateWeekendRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Weekend;
use Illuminate\Http\Request;
use Flash;
use Response;

class WeekendController extends AppBaseController
{
    /**
     * Display a listing of the Weekend.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Weekend $weekends */
        $weekends = Weekend::paginate(10);

        return view('weekends.index')
            ->with('weekends', $weekends);
    }

    /**
     * Show the form for creating a new Weekend.
     *
     * @return Response
     */
    public function create()
    {
        return view('weekends.create');
    }

    /**
     * Store a newly created Weekend in storage.
     *
     * @param CreateWeekendRequest $request
     *
     * @return Response
     */
    public function store(CreateWeekendRequest $request)
    {
        $input = $request->all();

        /** @var Weekend $weekend */
        $weekend = Weekend::create($input);

        Flash::success('Weekend saved successfully.');

        return redirect(route('weekends.index'));
    }

    /**
     * Display the specified Weekend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Weekend $weekend */
        $weekend = Weekend::find($id);

        if (empty($weekend)) {
            Flash::error('Weekend not found');

            return redirect(route('weekends.index'));
        }

        return view('weekends.show')->with('weekend', $weekend);
    }

    /**
     * Show the form for editing the specified Weekend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Weekend $weekend */
        $weekend = Weekend::find($id);

        if (empty($weekend)) {
            Flash::error('Weekend not found');

            return redirect(route('weekends.index'));
        }

        return view('weekends.edit')->with('weekend', $weekend);
    }

    /**
     * Update the specified Weekend in storage.
     *
     * @param int $id
     * @param UpdateWeekendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWeekendRequest $request)
    {
        /** @var Weekend $weekend */
        $weekend = Weekend::find($id);

        if (empty($weekend)) {
            Flash::error('Weekend not found');

            return redirect(route('weekends.index'));
        }

        $weekend->fill($request->all());
        $weekend->save();

        Flash::success('Weekend updated successfully.');

        return redirect(route('weekends.index'));
    }

    /**
     * Remove the specified Weekend from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Weekend $weekend */
        $weekend = Weekend::find($id);

        if (empty($weekend)) {
            Flash::error('Weekend not found');

            return redirect(route('weekends.index'));
        }

        $weekend->delete();

        Flash::success('Weekend deleted successfully.');

        return redirect(route('weekends.index'));
    }
}
