<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class StoriesSectionController extends Controller
{
    /**
     * Show stories section management
     */
    public function index()
    {
        $description = Text::getByKey('stories_description');

        return view('admin.sections.stories', compact('description'));
    }

    /**
     * Update stories section
     */
    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ], [
            'description.required' => 'Описанието е задължително.',
        ]);

        Text::setByKey('stories_description', $request->description);

        return redirect()->route('admin.stories.index')
            ->with('success', 'Секцията беше обновена успешно.');
    }
}
