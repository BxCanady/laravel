<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    public function index()
    {
        $response = Http::get('https://remoteok.com/api');
        $jobs = $response->json();

        // Remove the first element (API terms)
        array_shift($jobs);

        return view('jobs.index', compact('jobs'));
    }
}