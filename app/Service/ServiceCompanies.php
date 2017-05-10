<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 17/04/17
 * Time: 17:42
 */

namespace App\Service;


use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;

class ServiceCompanies
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * ServiceCompanies constructor.
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return CompanyRepository
     */
    private function getCompanyRepository()
    {
        return $this->companyRepository;
    }

    public function getCompanies()
    {
        return $this->getCompanyRepository()->paginate();
    }
    public function getCompanyList()
    {
        if(Auth::user()->roles->first()->id >3 )
        {
            return Auth::user()->company->pluck( 'name', 'id');
        }
        return $this->getCompanyRepository()->all()->pluck('name', 'id');
    }
}