<?php

namespace App\Services;

use App\Models\ClaimClient;
use App\Models\CreditProduct;
use App\Models\Client;
use App\Models\GraphClient;
use DateInterval;
use DatePeriod;
use DateTime;
use http\Env\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class CreditProductServise
{
    public function credit_product($request)
    {
        $credit = CreditProduct::create([
            'title' => $request->title,
            'max_period' => $request->max_period,
            'max_summa' => $request->max_summa,
            'percent' => $request->percent
        ]);
        return response()->json(['ok']);

    }

    public function get_credit_product()
    {
        return response()->json([CreditProduct::all()]);
    }

    public function client($request)
    {
        $client = Client::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'middle_name' => $request->middle_name,
            'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
            'phone' => $request->phone
        ]);
        return response()->json(['ajoyib']);
    }

    public function getclient()
    {
        return response()->json([Client::all()]);
    }

    public function claim_credit($request)
    {
        $credit = CreditProduct::find($request->credit_product_id);
        $pul = $credit->max_summa;
        $period = $credit->max_period;
        if ($pul < $request->summa) {
            return response()->json(["pul mablag'i mavjud emas"]);
        }

        if ($period < $request->period) {
            return response()->json(['kechirasiz bizda buncha oyga kredit berilmaydi']);
        }

        ClaimClient::create([
            'client_id' => $request->client_id,
            'credit_product_id' => $request->credit_product_id,
            'summa' => $request->summa,
            'period' => $request->period,
        ]);

        return response()->json(['bunaqasi bolmagan!! Tassano']);
    }

    public function get_claim_client()
    {
        return response()->json(ClaimClient::all());
    }

    public function graph_client($request)
    {
        $claim = ClaimClient::find($request->claim_client_id);
        $order = $claim->period;
        $total_loan = $claim->summa;
        $percent = CreditProduct::find($request->credit_product_id)->percent;

        for ($i = 0; $i < $order; $i++) {

            $data = new GraphClient;
            $data->client_id = $request->client_id;
            $data->credit_product_id = $request->credit_product_id;
            $data->claim_client_id = $request->claim_client_id;
            $data->ordering = $i + 1;
            $data->paid = 0;
            $data->loan = $claim->summa / $order;
            $tolov_sanasi = date('Y-m-05', strtotime("+$data->ordering month"));
            $kun = date('w', strtotime($tolov_sanasi));
            if ($kun == 0) {

                $tolov_sanasi = date('Y-m-d', strtotime("+1 day", strtotime($tolov_sanasi)));

            } elseif ($kun == 6) {
                $tolov_sanasi = date('Y-m-d', strtotime("+2 day", strtotime($tolov_sanasi)));
            }
            $data->month = $tolov_sanasi;
            $data->percent_loan = ($total_loan * $percent / 100) / 12;

            $data->total_loan = $total_loan - $data->loan;
            $total_loan = $total_loan - $data->loan;
            $data->save();
        }
        return response()->json(['nice']);
    }

    public function paid($request)
    {
        $graphs = GraphClient::where('claim_client_id', $request->claim_client_id)
            ->where('loan', '>', '0')->get();
        $summa = $request->summa;
        foreach ($graphs as $graph) {

            if ($summa <= $graph->loan) {
                $graph->loan = $graph->loan - $summa;
                $graph->paid = $graph->paid + $summa;
                $graph->save();
                break;
            }
            if ($summa > $graph->loan) {
                $summa = $summa - $graph->loan;
                $qarz = $graph->loan;
                $graph->loan = 0;
                //loan = 0
                //paid = 300
                $graph->paid = $graph->paid + $qarz;
                //paid = 300+200
                $graph->save();
            }

        }
        return response()->json(['ok']);
    }


}




















