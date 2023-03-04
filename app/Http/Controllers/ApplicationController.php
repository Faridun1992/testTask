<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Product;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        if (!auth()->user()->is_buyer){
            $applications = collect([]);

            auth()->user()->products->each(function ($product) use (&$applications){
                $requests =Application::query()
                     ->where('title', $product->title)
                    ->where('price_from', '<=', $product->price)
                    ->where('price_to', '>=', $product->price)
                    ->where('type', $product->type)
                    ->get();

                $applications = $applications->merge($requests);
            });
            $applications = $applications->unique();
        }

        return view('application', compact('applications'));
    }

    public function create()
    {
        abort_if(!auth()->user()->is_buyer, 403);

        return view('applications-create');
    }

    public function store(ApplicationRequest $request, Application $application)
    {
        abort_if(!auth()->user()->is_buyer, 403);

        $application->create($request->validated() + ['user_id' => auth()->id()]);

        return to_route('applications');
    }
}
