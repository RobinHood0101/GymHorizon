<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPDFExport;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PDFController extends Controller
{
    public function buildPDF(string $type): JsonResponse
    {
        $filename = "exports/{$type}_" . now()->timestamp . '.pdf';
        ProcessPDFExport::dispatch(auth()->id(), $type, $filename);
        return response()->json(['url' => $filename]);
    }

    public function getPDF(string $file): StreamedResponse
    {
        $path = 'exports/' . $file;
        if (! Storage::disk('public')->exists($path)) {
            abort(404);
        }
        return Storage::disk('public')->download($path, $file);
    }
}
