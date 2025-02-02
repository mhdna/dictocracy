<?php

namespace App\Http\Controllers;

use App\Models\Definition;
use Illuminate\Http\Request;

class DefinitionVoteController extends Controller
{
    public function upvote(Definition $definition)
    // TODO to clean up and understand better
    {
        $voter = auth()->user();

        // Check if the user has already voted on this definition
        $existingVote = $voter->votes()->where('definition_id', $definition->id)->first();

        if ($existingVote) {
            // If the user has upvoted already, remove the vote (unvote)
            if ($existingVote->pivot->vote == 1) {
                $voter->votes()->detach($definition->id);
            } else {
                // If the user has downvoted, update the vote to upvote
                $voter->votes()->updateExistingPivot($definition->id, ['vote' => 1]);
            }
        } else {
            // If the user has not voted yet, add the upvote
            $voter->votes()->attach($definition->id, ['vote' => 1]);
        }

        return redirect()->route('home')->with('success', 'Vote updated successfully.');
    }

    public function downvote(Definition $definition)
    {
        $voter = auth()->user();

        // Check if the user has already voted on this definition
        $existingVote = $voter->votes()->where('definition_id', $definition->id)->first();

        if ($existingVote) {
            // If the user has downvoted already, remove the vote (unvote)
            if ($existingVote->pivot->vote == -1) {
                $voter->votes()->detach($definition->id);
            } else {
                // If the user has upvoted, update the vote to downvote
                $voter->votes()->updateExistingPivot($definition->id, ['vote' => -1]);
            }
        } else {
            // If the user has not voted yet, add the downvote
            $voter->votes()->attach($definition->id, ['vote' => -1]);
        }

        return redirect()->route('home')->with('success', 'Vote updated successfully.');
    }
}
