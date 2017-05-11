<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Service\ServiceProject;
use App\Service\ServiceTasks;
use DOMDocument;
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
    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @var ServiceProject
     */
    private $serviceProject;
    /**
     * @var ServiceTasks
     */
    private $serviceTasks;

    public function __construct(ImportRepository $repository, ImportValidator $validator, CompanyRepository $companyRepository, ServiceProject $serviceProject, ServiceTasks $serviceTasks)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->companyRepository = $companyRepository;
        $this->serviceProject = $serviceProject;
        $this->serviceTasks = $serviceTasks;
    }

    /**
     * @return ServiceTasks
     */
    public function getServiceTasks()
    {
        return $this->serviceTasks;
    }

    /**
     * @return ServiceProject
     */
    public function getServiceProject()
    {
        return $this->serviceProject;
    }

    /**
     * @return CompanyRepository
     */
    public function getCompanyRepository()
    {
        return $this->companyRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $imports = $this->repository->orderBy('id', 'desc')->paginate();
        $companies = $this->getCompanyRepository()->all()->pluck('name','id');
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $imports,
            ]);
        }

        return view('admin.imports.index', compact('imports', 'companies'));
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
            $filename =  basename($request->file('filexml')->getClientOriginalName(), '.'.$request->file('filexml')->getClientOriginalExtension());
            $file =  str_slug($filename).'.'.$request->file('filexml')->getClientOriginalExtension();
            $directory = 'uploads/files/';
            if (!file_exists(public_path($directory))) {
                //criar
                mkdir( public_path($directory), 0777, true);
            }
            if(file_exists($directory.$file))
            {
                unlink($directory.$file);
            }

            $path = $request->file('filexml')->storeAs($directory, $file, 'public');
            chmod($directory.$file, 0777);
            $data['user_id'] = Auth::user()->id;
            $data['file'] = public_path($directory.$file);
            $import = $this->repository->create($data);
            $response = [
                'message' => 'Arquivo Importado.',
                'data'    => $import->toArray(),
            ];
            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('imports.show', [$import])->with('message', $response['message']);
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
//        dd($import);
        var_dump(libxml_use_internal_errors(true));

        // load the document
        $doc = new DOMDocument;

        if (!$doc->load($import->file)) {
            foreach (libxml_get_errors() as $error) {
                print_r($error);
            }

            libxml_clear_errors();
        }


//        $xml = simplexml_load_file($import->file);
        dd(($import->file));
        $projeto = [
            "Name" => $xml->Name->__toString(),
            "Title" => $xml->Title->__toString(),
            "Author" => $xml->Author->__toString(),
            "CreationDate" => $xml->CreationDate->__toString(),
            "LastSaved" => $xml->LastSaved->__toString(),
            "ScheduleFromStart" => $xml->ScheduleFromStart->__toString(),
            "StartDate" => $xml->StartDate->__toString(),
            "FinishDate" => $xml->FinishDate->__toString(),
            "FYStartDate" => $xml->FYStartDate->__toString(),
            "CriticalSlackLimit" => $xml->CriticalSlackLimit->__toString(),
            "CurrencyDigits" => $xml->CurrencyDigits->__toString(),
            "CurrencySymbol" => $xml->CurrencySymbol->__toString(),
            "CurrencyCode" => $xml->CurrencyCode->__toString(),
            "CurrencySymbolPosition" => $xml->CurrencySymbolPosition->__toString(),
            "CalendarUID" => $xml->CalendarUID->__toString(),
            "BaselineCalendar" => $xml->BaselineCalendar->__toString(),
            "DefaultStartTime" => $xml->DefaultStartTime->__toString(),
            "DefaultFinishTime" => $xml->DefaultFinishTime->__toString(),
            "MinutesPerDay" => $xml->MinutesPerDay->__toString(),
            "MinutesPerWeek" => $xml->MinutesPerWeek->__toString(),
            "DaysPerMonth" => $xml->DaysPerMonth->__toString(),
            "DefaultTaskType" => $xml->DefaultTaskType->__toString(),
            "DefaultFixedCostAccrual" => $xml->DefaultFixedCostAccrual->__toString(),
            "DefaultStandardRate" => $xml->DefaultStandardRate->__toString(),
            "DefaultOvertimeRate" => $xml->DefaultOvertimeRate->__toString(),
            "DurationFormat" => $xml->DurationFormat->__toString(),
            "WorkFormat" => $xml->WorkFormat->__toString(),
            "EditableActualCosts" => $xml->EditableActualCosts->__toString(),
            "HonorConstraints" => $xml->HonorConstraints->__toString(),
            "InsertedProjectsLikeSummary" => $xml->InsertedProjectsLikeSummary->__toString(),
            "MultipleCriticalPaths" => $xml->MultipleCriticalPaths->__toString(),
            "NewTasksEffortDriven" => $xml->NewTasksEffortDriven->__toString(),
            "NewTasksEstimated" => $xml->NewTasksEstimated->__toString(),
            "SplitsInProgressTasks" => $xml->SplitsInProgressTasks->__toString(),
            "SpreadActualCost" => $xml->SpreadActualCost->__toString(),
            "SpreadPercentComplete" => $xml->SpreadPercentComplete->__toString(),
            "TaskUpdatesResource" => $xml->TaskUpdatesResource->__toString(),
            "FiscalYearStart" => $xml->FiscalYearStart->__toString(),
            "WeekStartDay" => $xml->WeekStartDay->__toString(),
            "MoveCompletedEndsBack" => $xml->MoveCompletedEndsBack->__toString(),
            "MoveRemainingStartsBack" => $xml->MoveRemainingStartsBack->__toString(),
            "MoveRemainingStartsForward" => $xml->MoveRemainingStartsForward->__toString(),
            "MoveCompletedEndsForward" => $xml->MoveCompletedEndsForward->__toString(),
            "BaselineForEarnedValue" => $xml->BaselineForEarnedValue->__toString(),
            "AutoAddNewResourcesAndTasks" => $xml->AutoAddNewResourcesAndTasks->__toString(),
            "StatusDate" => $xml->StatusDate->__toString(),
            "CurrentDate" => $xml->CurrentDate->__toString(),
            "MicrosoftProjectServerURL" => $xml->MicrosoftProjectServerURL->__toString(),
            "Autolink" => $xml->Autolink->__toString(),
            "NewTaskStartDate" => $xml->NewTaskStartDate->__toString(),
            "NewTasksAreManual" => $xml->NewTasksAreManual->__toString(),
            "DefaultTaskEVMethod" => $xml->DefaultTaskEVMethod->__toString(),
            "ProjectExternallyEdited" => $xml->ProjectExternallyEdited->__toString(),
            "ExtendedCreationDate" => $xml->ExtendedCreationDate->__toString(),
            "ActualsInSync" => $xml->ActualsInSync->__toString(),
            "RemoveFileProperties" => $xml->RemoveFileProperties->__toString(),
            "AdminProject" => $xml->AdminProject->__toString(),
            "UpdateManuallyScheduledTasksWhenEditingLinks" => $xml->UpdateManuallyScheduledTasksWhenEditingLinks->__toString(),
            "KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled" => $xml->KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled->__toString(),
        ];
        $tasks = collect(collect(json_decode(json_encode($xml->Tasks),true  ))->first());
        $resources = collect(collect(json_decode(json_encode($xml->Resources),true  ))->first());
        $pulmao = $tasks->where('Name',"=", 'PULMÃO DE PROJETO')->first();
        $total_tarefas = $tasks->count();
        $company = $this->getCompanyRepository()->find($import->company_id);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $import,
            ]);
        }

        return view('admin.imports.show', compact('import', 'projeto', 'tasks', 'pulmao', 'total_tarefas', 'resources', 'company'));
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

    public function import(Request $request)
    {
        $data = $request->all();

//        importacao de dados do projeto
        $project = $this->getServiceProject()->tratarImport($data['project']);
        $tasks = $this->getServiceTasks()->tratarImport($this->getTaskByFile($data['filepath']), $project);
//        dd($tasks);
//        $resouces = $this->getServiceProject()->tratarImport($data['resources']);
        //set import como concluído
        $import = $this->repository->find($data['id']);
        $import->project_id = $project->id;
        $import->status = '1';
        $import->save();
        return redirect()->route('imports.index')->with(['message'=>'Sincronização concluída!']);



    }
    public function getTaskByFile($file)
    {

        $xml = simplexml_load_file($file);
        $tasks = collect(collect(json_decode(json_encode($xml->Tasks),true  ))->first());
        return $tasks;
    }
}
