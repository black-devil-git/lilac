<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designation;
use App\Models\Department;

class SearchController extends Controller
{
    
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = User::with('designation', 'department')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('designation', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('department', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();

        $designations = Designation::where('name', 'LIKE', "%{$query}%")->get();
        $departments = Department::where('name', 'LIKE', "%{$query}%")->get();

        return view('search', compact('users', 'designations', 'departments'));
    }
}

