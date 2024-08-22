<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        return Redirect::to('/');
    }

    public function update(Request $request): RedirectResponse
    {
        return Redirect::to('/');
    }

    public function destroy(Request $request): RedirectResponse
    {
        return Redirect::to('/');
    }
}
