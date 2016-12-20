<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CalendarCreateRequest;
use App\Http\Requests\CalendarUpdateRequest;
use App\Repositories\CalendarRepository;
use App\Validators\CalendarValidator;


class CalendarsController extends Controller
{

    /**
     * @var CalendarRepository
     */
    protected $repository;

    /**
     * @var CalendarValidator
     */
    protected $validator;

    public function __construct(CalendarRepository $repository, CalendarValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $calendars = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calendars,
            ]);
        }

        return view('calendars.index', compact('calendars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CalendarCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $calendar = $this->repository->create($request->all());

            $response = [
                'message' => 'Calendar created.',
                'data'    => $calendar->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendar = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $calendar,
            ]);
        }

        return view('calendars.show', compact('calendar'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $calendar = $this->repository->find($id);

        return view('calendars.edit', compact('calendar'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CalendarUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CalendarUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $calendar = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Calendar updated.',
                'data'    => $calendar->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Calendar deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Calendar deleted.');
    }
}
