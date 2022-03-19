<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\EditCompanyRequest;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyRepository->list();

        return new CompanyCollection($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCompanyRequest $request)
    {
        $data = $request->validated();

        $company = $this->companyRepository->create($data);

        return (new CompanyResource($company))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        $this->companyRepository->update($company->id, $data);

        return response()->json()->setStatusCode(204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->companyRepository->delete($company->id);

        return response()->json()->setStatusCode(204);
    }

    /**
     * List all display from a company
     */
    public function displays(Company $company)
    {
        $company->load('displays');

        return new CompanyResource($company);
    }
}
