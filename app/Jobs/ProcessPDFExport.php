<?php

namespace App\Jobs;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProcessPDFExport implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $userId,
        public string $type,
        public string $filename,
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('PDF export started for user ID: ' . $this->userId . ' and type: ' . $this->type);

        $user = User::findOrFail($this->userId);

        $methodName = Str::camel($this->type);

        if (!method_exists($user, $methodName)) {
            Log::error('Method ' . $methodName . ' does not exist in User model');
            return;
        }

        $pdf = Pdf::loadView('pdf.export', [
            'type' => $this->type,
            'items' => $user->{$methodName}()->get(),
        ]);

        Storage::disk('public')->put(
            $this->filename,
            $pdf->output()
        );
    }
}
