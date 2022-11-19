<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Student;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // ------------------------- PROGRAMA ------------------------------
        Subject::factory()->create([
            'name' => 'Primavera',
        ]);
        Subject::factory()->create([
            'name' => 'Canto',
        ]);
        Subject::factory()->create([
            'name' => 'Baile',
        ]);

        // -------------------------- PRIMAVERA -------------------------

        $student = Student::factory()->create([
            'name' => 'Jorge Puerto',
            'inscription_date' => Carbon::parse('23-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Stefan Xu',
            'inscription_date' => Carbon::parse('23-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'González Garcia',
            'inscription_date' => Carbon::parse('23-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Rodríguez López',
            'inscription_date' => Carbon::parse('23-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Juan Albornoz',
            'inscription_date' => Carbon::parse('27-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Ricardo Perez',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Alicia Centeno',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Juan Ku',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Maria Delgado',
            'inscription_date' => Carbon::parse('27-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Karen Sarmiento',
            'inscription_date' => Carbon::parse('27-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Juan Ruiz',
            'inscription_date' => Carbon::parse('27-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 1,
        ]);
        // ****************************************


        // -------------------------- CANTO -------------------------
        $student = Student::factory()->create([
            'name' => 'Manual Puga',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Luis Pech',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Alejandro Cantun',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Ricardo Ofarri',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Manuel Pech',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Josue Dominguez',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Karen Sarmiento',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Manuel Delgado',
            'inscription_date' => Carbon::parse('25-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Ricardo Ruiz',
            'inscription_date' => Carbon::parse('27-06-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 2,
        ]);
        // ****************************************


        // -------------------------- CANTO -------------------------
        $student = Student::factory()->create([
            'name' => 'Alicia ceballos',
            'inscription_date' => Carbon::parse('28-07-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 3,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Juan Uku',
            'inscription_date' => Carbon::parse('28-07-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 3,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Marina Gutierres',
            'inscription_date' => Carbon::parse('28-07-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 3,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Daniel Perez',
            'inscription_date' => Carbon::parse('28-07-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 3,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Maria Gonzales',
            'inscription_date' => Carbon::parse('28-07-2022'),
        ]);
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 3,
        ]);
        // ****************************************
        $student = Student::factory()->create([
            'name' => 'Marisol Hernandez',
            'inscription_date' => Carbon::parse('28-07-2022'),
        ]); 
        \App\Models\Subject_has_student::factory()->create([
            'student_id' => $student->id,
            'subject_id' => 3,
        ]);
        // ****************************************
       
    }
}
