<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index() {
        return Inertia::render('Project/Index', [
            'projects' => Project::all()
        ]);
    }

    public function create() {
        return Inertia::render('Project/Create', [
            'customers' => Customer::all()
        ]);
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        return Inertia::render('Project/Edit', [
            'project' => $project,
            'customers' => Customer::all()
        ]);
    }

    public function update($id, Request $request) {

        $project = Project::findOrFail($id);

        $request->validate([
            'customer_id'       => ['required'],
            'last_name'       => ['required'],
            'first_name'    => ['required'],
            'phone_number'    => ['required'],
            'email'  => ['required'],
            'title'  => ['required'],
            'description'  => ['required'],
            'start_date'  => ['required'],
            'end_date'  => ['required'],
            'status'  => ['required'],
            'day_sell'  => ['required'],
        ]);

        $project->update($request->only(
            'customer_id',
            'last_name',
            'first_name',
            'phone_number',
            'email',
            'title',
            'description',
            'start_date',
            'end_date',
            'status',
            'day_sell',
        ));

        return redirect()->route('project.index');
    }

    public function store(Request $request) {
        $request->validate([
            'customer_id'       => ['required'],
            'last_name'       => ['required'],
            'first_name'    => ['required'],
            'phone_number'    => ['required'],
            'email'  => ['required'],
            'title'  => ['required'],
            'description'  => ['required'],
            'start_date'  => ['required'],
            'end_date'  => ['required'],
            'status'  => ['required'],
            'day_sell'  => ['required'],
        ]);

        Project::create($request->only(
            'customer_id',
            'last_name',
            'first_name',
            'phone_number',
            'email',
            'title',
            'description',
            'start_date',
            'end_date',
            'status',
            'day_sell',
        ));

        return redirect()->route('project.index');
    }

    public function delete($id) {

        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('project.index');
    }
}
