<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use Illuminate\Http\Request;

class DefinitionVoteController extends Controller
{
    public function upvote(Definition $definition)
    {
        $voter = auth()->user();

        $existingVote = $voter->votes()->where('definition_id', $definition->id)->first();

        if ($existingVote) {
            if ($existingVote->pivot->vote == 1) {
                $voter->votes()->detach($definition->id);
            } else {
                $voter->votes()->updateExistingPivot($definition->id, ['vote' => 1]);
            }
        } else {
            $voter->votes()->attach($definition->id, ['vote' => 1]);
        }

        return back()->with('success', 'Vote updated successfully.');
    }

    public function downvote(Definition $definition)
    {
        $voter = auth()->user();

        $existingVote = $voter->votes()->where('definition_id', $definition->id)->first();

        if ($existingVote) {
            if ($existingVote->pivot->vote == -1) {
                $voter->votes()->detach($definition->id);
            } else {
                $voter->votes()->updateExistingPivot($definition->id, ['vote' => -1]);
            }
        } else {
            $voter->votes()->attach($definition->id, ['vote' => -1]);
        }

        return back()->with('success', 'Vote updated successfully.');
    }
}
