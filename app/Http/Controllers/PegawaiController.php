<?php

namespace App\Http\Controllers;

use App\DataTables\PegawaiDataTable;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PegawaiController extends Controller
{
    private $positions = [
        'Manager',
        'Supervisor',
        'Staff',
        'Intern'
    ];

    public function index(Request $request)
    {
        $query = Pegawai::query();

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('position', 'like', '%' . $searchTerm . '%');
            });
        }

        $pegawais = $query->paginate(10)->withQueryString();

        return view('pegawais.index', compact('pegawais'));
    }


    public function create()
    {
        return view('pegawais.create', ['positions' => $this->positions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pegawais',
            'phone' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['photo'] = $filename;
        }

        Pegawai::create($data);

        return redirect()->route('pegawais.index')->with('success', 'Pegawai created successfully.');
    }


    public function show(Pegawai $pegawai)
    {
        return view('pegawais.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawais.edit', ['pegawai' => $pegawai, 'positions' => $this->positions]);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pegawais,email,' . $pegawai->id,
            'phone' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data['photo'] = $filename;
        }

        $pegawai->update($data);

        return redirect()->route('pegawais.index')->with('success', 'Pegawai updated successfully.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawais.index')->with('success', 'Pegawai berhasil dihapus.');
    }

}

