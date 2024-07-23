<?php

namespace App\Repository ;

interface TeacherRepositoryInterface{

    public function getAllTeachers();


    public function GetSpecialization();

    public function GetGender();

    public function StoreTeachers($request);

    public function EditTeachers($request);
    public function UpdateTeachers($request);
    public function DeleteTeachers($request);



}
