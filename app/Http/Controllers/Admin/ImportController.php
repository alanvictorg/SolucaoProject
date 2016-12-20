<?php
/**
 * Copyright (c) 2016. Include Tecnologia http://includetecnologia.com.br
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProjectRequest;
use App\Services\ServiceCompany;
use App\Services\ServiceProject;
use App\Services\ServiceTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use XmlParser;

class ImportController extends Controller
{
    /**
     * @var ServiceProject
     */
    private $serviceProject;
    /**
     * @var ServiceCompany
     */
    private $serviceCompany;
    /**
     * @var ServiceTask
     */
    private $serviceTask;

    /**
     * ImportController constructor.
     * @param ServiceProject $serviceProject
     */
    public function __construct(ServiceProject $serviceProject, ServiceCompany $serviceCompany, ServiceTask $serviceTask)
    {
        $this->serviceProject = $serviceProject;
        $this->serviceCompany = $serviceCompany;
        $this->serviceTask = $serviceTask;
    }

    /**
     * @return ServiceTask
     */
    public function getServiceTask()
    {
        return $this->serviceTask;
    }

    /**
     * @return ServiceCompany
     */
    public function getServiceCompany()
    {
        return $this->serviceCompany;
    }

    /**
     * @return ServiceProject
     */
    public function getServiceProject()
    {
        return $this->serviceProject;
    }

    public function index()
    {
        $companies = $this->getServiceCompany()->lists();
        return view('import.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $filename = Storage::disk('public')->putFile('', $request->file('filexml'));

        $filepath = public_path('uploads/' . $filename);

        $directory = public_path('uploads/files');
        if (!file_exists($directory)) {
            //criar
            mkdir($directory, 0777);
        }
        $rar_arch = $this->descompress_rar($filepath);

        $content = $directory . '/' . $rar_arch;
        $xml = simplexml_load_file($content);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $array['company_id'] = $request->company_id;
        if (unlink($filepath) && unlink($content))
        {
            $name = $array['Title'];
            $projects = $this->verifyData($name);
            if ($projects->isEmpty()) {
                $project = $this->getServiceProject()->store($array);
                foreach ($array['Tasks']['Task'] as $task)
                {
                    $task['project_id'] = $project->id;
                    $task = $this->getServiceTask()->create($task);
                }
            }else
                {
                    $project = $this->getServiceProject()->update($array);
                }

        }
        return $project;
    }


    protected function verifyData($name)
    {
        $project = $this->getServiceProject()->findByName($name);
        return $project;
    }
    protected function descompress_rar($filepath)
    {
        $archive = rar_open($filepath);
        $entries = $archive->getEntries();
        foreach ($entries as $entry) {
            $file = $entry->extract(public_path('uploads/files'));
            $file_name = $entry->getName();
        }
        $archive->close();


        return $file_name;
    }


    public function createproject()
    {
        $dados = session('data');
        $company = $this->getServiceCompany()->lists();
        return view('import.createproject',compact('dados', 'company'));
    }

    public function storeproject(CreateProjectRequest $request)
    {
        $data = $request->all();
        $project = $this->getServiceProject()->store($data);
        return redirect()->route('admin.import.index')->with(['message'=>"Dados Inseridos com Sucesso"]);

    }
}
