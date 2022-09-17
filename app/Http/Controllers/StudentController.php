<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class StudentController extends Controller
{
    public function index(): Factory|View|Application
    {
        $students = Student::count();
        return view('index', compact('students'));
    }

    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        SimpleExcelReader::create($request->file, 'csv')->getRows()
            ->each(function (array &$rowProperties) {
                $normalGenders = ['Male', 'Female'];

                if (!in_array($rowProperties['gender'], $normalGenders)) {
                    $rowProperties['gender'] = 'Abnormal';
                }

                // Skip duplicate emails
                if (!Student::where('email', $rowProperties['email'])->exists()) {
                    Student::create($rowProperties);
                }
            });

        return back()->with('message', 'Success!');
    }

    public function export()
    {
        $heading = [
            'First Name',
            'Last Name',
            'Email',
            'Gender',
            'Address',
            'Created At'
        ];

        $rows = session('students');

        SimpleExcelWriter::streamDownload('students_' . now()->format('ymd_His') . '.csv')
            ->noHeaderRow()
            ->addRow($heading)
            ->addRows($rows)
            ->toBrowser();
    }
}
