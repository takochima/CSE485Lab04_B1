<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = Reader::paginate(5);
        return view('readers.index', compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('readers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
    
        // Tạo mới độc giả
        Reader::create($request->all());
    
        // Chuyển hướng về giao diện index với thông báo thành công
        return redirect()->route('readers.index')->with('success', 'Thêm độc giả thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reader = Reader::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $reader->update($validatedData);

        return redirect()->route('readers.show', $reader->id)
            ->with('success', 'Độc giả cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();

        return redirect()->route('readers.index')
            ->with('success', 'Xoá độc giả thành công.');
    }
}
