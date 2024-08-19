<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the classes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all classes that are not deleted
        $classes = DB::table('classes')
            ->whereNull('deleted_at')
            ->get();

        // Return the view with the classes
        return view('user.classes.index', ['classes' => $classes]);
    }
}
