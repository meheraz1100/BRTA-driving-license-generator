<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationApprovedMail;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function index()
    {
        $applications = Application::latest()->get();

        return view('admin.dashboard', compact('applications'));
    }

    public function approve(Application $application)
    {
        if ($application->status !== 'pending') {
            abort(403);
        }

        $application->update([
            'status' => 'approved',
        ]);

        $application->load('user');

        $recipient = $application->user?->email ?? $application->email;

        Mail::to($recipient)->send(new ApplicationApprovedMail($application));

        return back()->with(
            'success',
            'Application approved successfully.'
        );
    }

    public function reject(Request $request, Application $application)
    {
        if ($application->status !== 'pending') {
            abort(403);
        }

        $validated = $request->validate([
            'rejection_reason' => ['required', 'string', 'max:1000'],
        ]);

        $application->update([
            'status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
        ]);

        return back()->with(
            'success',
            'Application rejected successfully.'
        );
    }
}
