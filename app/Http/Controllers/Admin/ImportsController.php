<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ImportCreateRequest;
use App\Http\Requests\ImportUpdateRequest;
use App\Repositories\ImportRepository;
use App\Validators\ImportValidator;


class ImportsController extends Controller
{

    /**
     * @var ImportRepository
     */
    protected $repository;

    /**
     * @var ImportValidator
     */
    protected $validator;

    public function __construct(ImportRepository $repository, ImportValidator $validator)
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
        $imports = $this->repository->paginate();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $imports,
            ]);
        }

        return view('admin.imports.index', compact('imports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ImportCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ImportCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $data = $request->all();


            $filename = Storage::disk('public')->putFile('', $request->file('file'));

            $filepath = public_path('uploads/' . $filename);

            $directory = public_path('uploads/files');
            if (!file_exists($directory)) {
                //criar
                mkdir($directory, 0777, true);
            }
            $content = $directory . '/' . $filepath;


            $data[ 'user_id'] = Auth::user()->id;
            $data[ 'file'] = $filepath;

            $import = $this->repository->create($data);

            $response = [
                'message' => 'Arquivo Importado.',
                'data'    => $import->toArray(),
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
        $import = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $import,
            ]);
        }

        return view('admin.imports.show', compact('import'));
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

        $import = $this->repository->find($id);

        return view('admin.imports.edit', compact('import'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ImportUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ImportUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $import = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Import updated.',
                'data'    => $import->toArray(),
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
                'message' => 'Import deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Import deleted.');
    }
}
