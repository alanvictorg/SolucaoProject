<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 13/12/16
 * Time: 10:17
 */

namespace App\Services;


use App\Repositories\CompanyRepository;

class ServiceCompany
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * ServiceCompany constructor.
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return CompanyRepository
     */
    public function getCompanyRepository()
    {
        return $this->companyRepository;
    }

    public function all()
    {
        return $this->getCompanyRepository()->paginate(10);
    }
    public function find($id)
    {
        return $this->getCompanyRepository()->find($id);
    }

    public function lists()
    {
        return $this->getCompanyRepository()->all()->pluck('name','id');
    }
}