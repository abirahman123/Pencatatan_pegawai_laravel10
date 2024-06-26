<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    private $positions = [
        'Manager',
        'Supervisor',
        'Staff',
        'Intern'
    ];

    public function getWidgetData()
    {
        $totalEmployees = Pegawai::count();
        $newEmployees = Pegawai::whereDate('created_at', '>=', now()->subDays(7))->count();
        $positions = count($this->positions);

        return [
            'totalEmployees' => $totalEmployees,
            'newEmployees' => $newEmployees,
            'positions' => $positions,
        ];
    }
}
