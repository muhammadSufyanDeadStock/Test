<?php

namespace App\Http\Controllers;

use App\Jobs\csvExport;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;

class Products extends Controller
{
    private $ProductRepo;
    public function __construct(IProductRepository $repos)
    {
        $this->ProductRepo=$repos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->ProductRepo->index();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return $this->ProductRepo->create();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return $this->ProductRepo->store();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return $this->ProductRepo->edit();
    }
    public function export(){
        csvExport::dispatch($this->ProductRepo)->delay(now()->addMinutes(1));
        return $this->ProductRepo->index()->with('message',"Your File will be  Export at storage/app/public");;
    }
    public function exportDirect(){
        return $this->ProductRepo->export();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return $this->ProductRepo->update();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        return $this->ProductRepo->delete();
    }
}
