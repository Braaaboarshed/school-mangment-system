<?php


namespace App\Repository;


interface StudentGraduatedRepositoryInterface
{

    public function index();

    public function create();

    public function SoftDelete($request);

    public function returnDate($request);

    public function destroy($request) ;

}
