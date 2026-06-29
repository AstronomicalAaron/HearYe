<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string'],
        ]);

        $request->user()->announcements()->create($validated);

        return Redirect::route('home');
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        abort_unless($announcement->user_id === $request->user()->id, 403);

        $validated = $request->validate([
            'body' => ['required', 'string'],
        ]);

        $announcement->update($validated);

        return Redirect::route('home');
    }

    public function destroy(Request $request, Announcement $announcement): RedirectResponse
    {
        abort_unless($announcement->user_id === $request->user()->id, 403);

        $announcement->delete();

        return Redirect::route('home');
    }
}
