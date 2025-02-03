<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function approve()
    {
        // Fetch only unapproved definitions
        $definitions = Definition::where('is_approved', false)->get();

        return view('approvals.index', compact('definitions'));
    }

    public function approveDefinition($id)
    {
        // Find the definition and update its status
        $definition = Definition::findOrFail($id);
        $definition->is_approved = true;
        $definition->save();

        return redirect()->route('approve')->with('success', 'Definition approved successfully');
    }
}
