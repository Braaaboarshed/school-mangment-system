<?php

namespace App\Repository ;

interface StudentRepositoryInterface{

public function Get_Student();

public function Edit_Student($id);

public function Show_Student($id);

public function Update_Student($request);

public function Create_Student();

public function Get_classrooms($id);

public function Get_Sections($id);

public function Store_Student($request);

public function Delete_Student($request);

public function Upload_attachment($request);

public function Download_attachment($studentname,$filename) ;

public function Delete_attachment($request);

}
