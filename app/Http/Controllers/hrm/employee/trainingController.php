<?php

namespace App\Http\Controllers\hrm\employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

class TrainingController extends Controller
{
    /**
     * Display the list of active trainees.
     */
    public function training()
    {
        // Fetch users where position is 'trainee'
        // We include promotion_suggested so the frontend can filter them out or show status
        $trainees = User::where('position', 'trainee')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Dashboard/HRM/Employee/training', [
            'trainees' => $trainees,
        ]);
    }

    /**
     * Suggest a trainee for promotion to the HR Manager.
     */
    public function suggestPromotion($id)
    {
        // Find the trainee by ID
        $trainee = User::findOrFail($id);

        // Update the trainee record to mark as suggested
        // This prevents the Staff from seeing them in the active training list
        // and alerts the HR Manager to take action
        $trainee->update([
            'promotion_suggested' => true,
            'suggested_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Promotion suggestion sent to HR Manager.');
    }
}
