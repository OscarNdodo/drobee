<?php

namespace App\Http\Controllers;

use App\Models\SharedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB
            'expiration_type' => 'required|in:none,download,time',
            'expires_in_hours' => 'required_if:expiration_type,time|integer|min:1'
        ]);

        $file = $request->file('file');
        $token = Str::random(32);
        $path = $file->store('shared_files');

        $expiresAt = null;
        if ($request->expiration_type === 'time') {
            $expiresAt = now()->addHours($request->expires_in_hours);
        }

        $sharedFile = SharedFile::create([
            'token' => $token,
            'original_name' => $file->getClientOriginalName(),
            'storage_path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'expiration_type' => $request->expiration_type,
            'expires_at' => $expiresAt,
        ]);

        return redirect()->route('files.show', $token);
    }

    public function show($token)
    {
        $file = SharedFile::where('token', $token)->firstOrFail();

        return view('files.show', compact('file'));
    }

    public function download($token)
    {
        $file = SharedFile::where('token', $token)->firstOrFail();

        if ($file->isExpired()) {
            return view('files.download', [
                'error' => 'Este arquivo expirou e não está mais disponível'
            ]);
        }

        $file->markAsDownloaded();

        return Storage::download($file->storage_path, $file->original_name);
    }
}