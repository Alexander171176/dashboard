<?php

namespace App\Http\Controllers\Admin\Rubric;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rubric\CreateRubricRequest;
use App\Http\Resources\Admin\Rubric\RubricResource;
use App\Models\Admin\Rubric\Rubric;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $rubrics = Rubric::all();
        $rubricsCount = DB::table('rubrics')->count();

        return Inertia::render('Admin/Rubrics/Index', [
            'rubrics' => RubricResource::collection($rubrics),
            'rubricsCount' => $rubricsCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Rubrics/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRubricRequest $request): RedirectResponse
    {
        Rubric::create($request->validated());

        return redirect()->route('rubrics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rubric $rubric): Response
    {
        return Inertia::render('Admin/Rubrics/Edit', [
            'rubric' => new RubricResource($rubric)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateRubricRequest $request, Rubric $rubric): RedirectResponse
    {
        $rubric->update($request->validated());

        return redirect()->route('rubrics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rubric $rubric): RedirectResponse
    {
        $rubric->delete();

        return back();
    }
}
