<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplyController extends Controller
{
    public function show()
    {
        $report = Auth::user()->report;
        $sections = Section::all();
        return view('apply', compact('report', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'photo' => 'required|image|max:2048', // до 2MB
        ]);

        if (Auth::user()->report) {
            return redirect()->route('apply.show')->with('error', 'Вы уже отправили заявку!');
        }

        $path = $request->file('photo')->store('photos', 'public');

        Report::create([
            'user_id' => Auth::user()->id,
            'fullname' => $request->fullname,
            'theme' => $request->theme,
            'section_id' => $request->section_id,
            'path_img' => $path,
            'status' => 'pending',
        ]);

        return redirect()->route('apply.show')->with('success', 'Заявка успешно отправлена!');
    }
}
