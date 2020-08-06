<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedsController extends Controller
{
    public function generate($data)
    {
        $dataConvert = [];
        $dataInitial = $data[0]->kd_bangsal;
        $dataInitialName = $data[0]->nm_bangsal;
        $count = 0;
        $countIsi = 0;
        $countKosong = 0;
        $index = 0;
        Log::emergency('jumlah data', [count($data)]);
        foreach ($data as $this_data) {
            // Log::emergency($index);
            $this_data_kd_bangsal = $this_data->kd_bangsal;
            $this_data_status = $this_data->status;
            $this_data_statusdata = $this_data->statusdata;
            // Log::emergency($this_data->nm_bangsal, ['count' => $count, 'countIsi' => $countIsi, 'countKosong' => $countKosong]);


            if ($this_data_kd_bangsal != $dataInitial) {

                $dataConvert[] = [$dataInitialName, $count,  $countIsi, $countKosong];

                $dataInitial = $this_data_kd_bangsal;
                $dataInitialName = $this_data->nm_bangsal;
                $count = 0;
                $countIsi = 0;
                $countKosong = 0;
            }
            $count += 1;
            if ($this_data_status == 'ISI') {
                $countIsi += 1;
            } else if ($this_data_status == 'KOSONG') {
                $countKosong += 1;
            }
            if (count($data) - 1 == $index) {
                $dataConvert[] = [$dataInitialName, $count,  $countIsi, $countKosong];
            }
            $index += 1;
        }

        return $dataConvert;
    }
    public function generateRoom($data)
    {
        $dataConvert = [];
        $dataInitial = $data[0]->kelas;
        $count = 0;
        $countIsi = 0;
        $countKosong = 0;
        $index = 0;
        foreach ($data as $this_data) {
            Log::emergency($index);

            $this_data_kelas = $this_data->kelas;
            $this_data_status = $this_data->status;



            if ($this_data_kelas != $dataInitial) {

                $dataConvert[] = [$dataInitial, $count,  $countIsi, $countKosong];
                $dataInitial = $this_data->kelas;
                $count = 0;
                $countIsi = 0;
                $countKosong = 0;
            }
            $count += 1;
            if ($this_data_status == 'ISI') {
                $countIsi += 1;
            } else if ($this_data_status == 'KOSONG') {
                $countKosong += 1;
            }
            Log::emergency($this_data->kelas, ['count' => $count, 'countIsi' => $countIsi, 'countKosong' => $countKosong]);

            if (count($data) - 1 == $index) {
                $dataConvert[] = [$dataInitial, $count,  $countIsi, $countKosong];
            }
            $index += 1;
        }

        return $dataConvert;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::connection('mysql2')->select('SELECT bangsal.nm_bangsal, bangsal.kd_bangsal, kamar.statusdata, kamar.status FROM bangsal INNER JOIN kamar ON
        bangsal.kd_bangsal = kamar.kd_bangsal WHERE bangsal.status = 2 ORDER BY bangsal.nm_bangsal');
        $data = $this->generate($query);
        return $data;
        return view('beds.index')->with('query', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
