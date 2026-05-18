<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;

class DonorController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function create()
    {
        return view('donors.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|min:10|max:15',
        'age' => 'required|integer|min:18|max:60',
        'blood_group' => 'required',
        'city' => 'required',
        'availability' => 'required',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('photo')) {
        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads/donors'), $photoName);
        $data['photo'] = 'uploads/donors/' . $photoName;
    }

    Donor::create($data);

    return redirect()->back()->with('success', 'Donor registered successfully!');
}

    public function search(Request $request)
    {
        $donors = [];

        if ($request->blood_group || $request->city) {
            $donors = Donor::query()
                ->when($request->blood_group, function ($query) use ($request) {
                    return $query->where('blood_group', $request->blood_group);
                })
                ->when($request->city, function ($query) use ($request) {
                    return $query->where('city', 'LIKE', '%' . $request->city . '%');
                })
                ->where('availability', 'Available')
                ->get();
        }

        return view('donors.search', compact('donors'));
    }

    public function index()
    {
        $donors = Donor::latest()->get();
        return view('donors.index', compact('donors'));
    }
}