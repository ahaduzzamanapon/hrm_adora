<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdvanceSalaryRequest;
use App\Http\Requests\UpdateAdvanceSalaryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AdvanceSalary;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdvanceSalaryController extends AppBaseController
{
    /**
     * Display a listing of the AdvanceSalary.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AdvanceSalary $advanceSalaries */
        $advanceSalaries = AdvanceSalary::select('advancesalarys.*', 'users.name', 'users.last_name')
                            ->leftJoin('users', 'users.id', '=', 'advancesalarys.emp_id')
                            ->paginate(10);

        return view('advance_salaries.index')
            ->with('advanceSalaries', $advanceSalaries);
    }

    /**
     * Show the form for creating a new AdvanceSalary.
     *
     * @return Response
     */
    public function create()
    {
        return view('advance_salaries.create');
    }

    /**
     * Store a newly created AdvanceSalary in storage.
     *
     * @param CreateAdvanceSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvanceSalaryRequest $request)
    {
        $input = $request->all();

        /** @var AdvanceSalary $advanceSalary */
        $advanceSalary = AdvanceSalary::create($input);

        Flash::success('Advance Salary saved successfully.');

        return redirect(route('advanceSalaries.index'));
    }

    /**
     * Display the specified AdvanceSalary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AdvanceSalary $advanceSalary */
        $advanceSalary = AdvanceSalary::find($id);

        if (empty($advanceSalary)) {
            Flash::error('Advance Salary not found');

            return redirect(route('advanceSalaries.index'));
        }

        return view('advance_salaries.show')->with('advanceSalary', $advanceSalary);
    }

    /**
     * Show the form for editing the specified AdvanceSalary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AdvanceSalary $advanceSalary */
        $advanceSalary = AdvanceSalary::find($id);

        if (empty($advanceSalary)) {
            Flash::error('Advance Salary not found');

            return redirect(route('advanceSalaries.index'));
        }

        return view('advance_salaries.edit')->with('advanceSalary', $advanceSalary);
    }

    /**
     * Update the specified AdvanceSalary in storage.
     *
     * @param int $id
     * @param UpdateAdvanceSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvanceSalaryRequest $request)
    {
        /** @var AdvanceSalary $advanceSalary */
        $advanceSalary = AdvanceSalary::find($id);

        if (empty($advanceSalary)) {
            Flash::error('Advance Salary not found');

            return redirect(route('advanceSalaries.index'));
        }

        $advanceSalary->fill($request->all());
        $advanceSalary->save();

        Flash::success('Advance Salary updated successfully.');

        return redirect(route('advanceSalaries.index'));
    }

    /**
     * Remove the specified AdvanceSalary from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AdvanceSalary $advanceSalary */
        $advanceSalary = AdvanceSalary::find($id);

        if (empty($advanceSalary)) {
            Flash::error('Advance Salary not found');

            return redirect(route('advanceSalaries.index'));
        }

        $advanceSalary->delete();

        Flash::success('Advance Salary deleted successfully.');

        return redirect(route('advanceSalaries.index'));
    }
}
