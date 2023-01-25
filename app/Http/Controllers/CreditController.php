<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaimClientRequest;
use App\Http\Requests\GraphClientRequest;
use App\Http\Requests\PaidRequest;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\ReportRequest;
use App\Services\CreditProductServise;
use Illuminate\Http\Request;
use App\Http\Requests\CreditProductRequest;
use App\Http\Requests\ClientRequest;


class CreditController extends Controller
{
    public $credit;
    public function __construct(CreditProductServise $credit){
        $this->credit=$credit;
    }

    public function credit_product(CreditProductRequest $request)
    {
        return $this->credit->credit_product($request);
    }

    public function get_credit_product()
    {
        return $this->credit->get_credit_product();
    }

    public function client(ClientRequest $request)
    {
      return $this->credit->client($request);
    }

    public function getclient()
    {
        return $this->credit->getclient();
    }
    public function claim_client(ClaimClientRequest $request)
    {
     return $this->credit->claim_credit($request);
    }

    public function get_claim_client()
    {
        return $this->credit->get_claim_client();
    }

    public function graph_client(GraphClientRequest $request)
    {
      return $this->credit->graph_client($request);
    }
    public function paid(PaidRequest $request)
    {
        return $this->credit->paid($request);
    }
    public  function type(TypeRequest $request)
    {
     return $this->credit->type($request);
    }

    public function report(ReportRequest $request)
    {
        return $this->credit->report($request);
    }




}
