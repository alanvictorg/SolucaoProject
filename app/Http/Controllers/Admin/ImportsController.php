<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Service\Dom;
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
use SplFileObject;
use XMLReader;


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
     * @param DOMDocument $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $import = $this->repository->find($id);
        $document = new Dom();
        $document->load($import->file);


        $projeto = [
            "Name" => $document->getNodeValue('Name'),
            "Title" => $document->getNodeValue('Title'),
            "Author" => $document->getNodeValue('Author'),
            "CreationDate" => $document->getNodeValue('CreationDate'),
            "LastSaved" => $document->getNodeValue('LastSaved'),
            "ScheduleFromStart" => $document->getNodeValue('ScheduleFromStart'),
            "StartDate" => $document->getNodeValue('StartDate'),
            "FinishDate" => $document->getNodeValue('FinishDate'),
            "FYStartDate" => $document->getNodeValue('FYStartDate'),
            "CriticalSlackLimit" => $document->getNodeValue('CriticalSlackLimit'),
            "CurrencyDigits" => $document->getNodeValue('CurrencyDigits'),
            "CurrencySymbol" => $document->getNodeValue('CurrencySymbol'),
            "CurrencyCode" => $document->getNodeValue('CurrencyCode'),
            "CurrencySymbolPosition" => $document->getNodeValue('CurrencySymbolPosition'),
            "CalendarUID" => $document->getNodeValue('CalendarUID'),
            "BaselineCalendar" => $document->getNodeValue('BaselineCalendar'),
            "DefaultStartTime" => $document->getNodeValue('DefaultStartTime'),
            "DefaultFinishTime" => $document->getNodeValue('DefaultFinishTime'),
            "MinutesPerDay" => $document->getNodeValue('MinutesPerDay'),
            "MinutesPerWeek" => $document->getNodeValue('MinutesPerWeek'),
            "DaysPerMonth" => $document->getNodeValue('DaysPerMonth'),
            "DefaultTaskType" => $document->getNodeValue('DefaultTaskType'),
            "DefaultFixedCostAccrual" => $document->getNodeValue('DefaultFixedCostAccrual'),
            "DefaultStandardRate" => $document->getNodeValue('DefaultStandardRate'),
            "DefaultOvertimeRate" => $document->getNodeValue('DefaultOvertimeRate'),
            "DurationFormat" => $document->getNodeValue('DurationFormat'),
            "WorkFormat" => $document->getNodeValue('WorkFormat'),
            "EditableActualCosts" => $document->getNodeValue('EditableActualCosts'),
            "HonorConstraints" => $document->getNodeValue('HonorConstraints'),
            "InsertedProjectsLikeSummary" => $document->getNodeValue('InsertedProjectsLikeSummary'),
            "MultipleCriticalPaths" => $document->getNodeValue('MultipleCriticalPaths'),
            "NewTasksEffortDriven" => $document->getNodeValue('NewTasksEffortDriven'),
            "NewTasksEstimated" => $document->getNodeValue('NewTasksEstimated'),
            "SplitsInProgressTasks" => $document->getNodeValue('SplitsInProgressTasks'),
            "SpreadActualCost" => $document->getNodeValue('SpreadActualCost'),
            "SpreadPercentComplete" => $document->getNodeValue('SpreadPercentComplete'),
            "TaskUpdatesResource" => $document->getNodeValue('TaskUpdatesResource'),
            "FiscalYearStart" => $document->getNodeValue('FiscalYearStart'),
            "WeekStartDay" => $document->getNodeValue('WeekStartDay'),
            "MoveCompletedEndsBack" => $document->getNodeValue('MoveCompletedEndsBack'),
            "MoveRemainingStartsBack" => $document->getNodeValue('MoveRemainingStartsBack'),
            "MoveRemainingStartsForward" => $document->getNodeValue('MoveRemainingStartsForward'),
            "MoveCompletedEndsForward" => $document->getNodeValue('MoveCompletedEndsForward'),
            "BaselineForEarnedValue" => $document->getNodeValue('BaselineForEarnedValue'),
            "AutoAddNewResourcesAndTasks" => $document->getNodeValue('AutoAddNewResourcesAndTasks'),
            "StatusDate" => $document->getNodeValue('StatusDate'),
            "CurrentDate" => $document->getNodeValue('CurrentDate'),
            "MicrosoftProjectServerURL" => $document->getNodeValue('MicrosoftProjectServerURL'),
            "Autolink" => $document->getNodeValue('Autolink'),
            "NewTaskStartDate" => $document->getNodeValue('NewTaskStartDate'),
            "NewTasksAreManual" => $document->getNodeValue('NewTasksAreManual'),
            "DefaultTaskEVMethod" => $document->getNodeValue('DefaultTaskEVMethod'),
            "ProjectExternallyEdited" => $document->getNodeValue('ProjectExternallyEdited'),
            "ExtendedCreationDate" => $document->getNodeValue('ExtendedCreationDate'),
            "ActualsInSync" => $document->getNodeValue('ActualsInSync'),
            "RemoveFileProperties" => $document->getNodeValue('RemoveFileProperties'),
            "AdminProject" => $document->getNodeValue('AdminProject'),
            "UpdateManuallyScheduledTasksWhenEditingLinks" => $document->getNodeValue('UpdateManuallyScheduledTasksWhenEditingLinks'),
            "KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled" => $document->getNodeValue('KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled'),
        ];


        $company = $this->getCompanyRepository()->find($import->company_id);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $import,
            ]);
        }

        return view('admin.imports.show', compact('import', 'projeto', 'company'));
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

        set_time_limit(0);
        ini_set('memory_limit', '20000M');

//        $xml = new XMLReader();
//        $xml->open($file);
//
//        while ($xml->read()) {
//            switch ($xml->nodeType) {
//                case (XMLReader::ELEMENT):
//                    if ($xml->localName == "Tasks") {
//                        $node = $xml->expand();
//                        $dom = new DomDocument();
//                        $n = $dom->importNode($node, true);
//                        $dom->appendChild($n);
//                        $simple_xml = simplexml_import_dom($n);
//                    }
//            }
//        }
//        $tasks = collect(collect(json_decode(json_encode($simple_xml),true  ))->first());
        $file = new SplFileObject($file);
        $contents = $file->fread($file->getSize());

//        dd($contents);
        $xml = simplexml_load_string($contents, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
        dd($xml);

//        return $tasks;
    }
}
