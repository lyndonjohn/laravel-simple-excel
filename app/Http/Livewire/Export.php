<?php

namespace App\Http\Livewire;

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Livewire\Component;
use Spatie\SimpleExcel\SimpleExcelWriter;

class Export extends Component
{
    public array $rows = [];
    public array $heading = [];

    public function render()
    {
        return view('livewire.export');
    }

    public function export()
    {
        $this->rows = [];
        Student::chunk(1000, function ($students) use (&$rows) {
            foreach ($students->toArray() as $student) {
                $this->rows[] = [
                    $student['first_name'],
                    $student['last_name'],
                    $student['email'],
                    ucfirst($student['gender']),
                    $student['address'],
                    (new \DateTime($student['created_at']))->format('F d, Y')
                ];
            }
        });

        return redirect()->action([StudentController::class, 'export'])->with('students', $this->rows);
    }
}
