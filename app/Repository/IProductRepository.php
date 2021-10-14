<?php
namespace App\Repository;
interface IProductRepository{
    function index();
    function create();
    function store();
    function edit();
    function update();
    function delete();
    function export();
}
