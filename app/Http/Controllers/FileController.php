<?php

namespace App\Http\Controllers;

use App\Models\SharedFile;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
            'expiration' => 'required',
        ]);

        $file = $request->file('file');
        // dd($file);
        $token = Str::random(32);
        $path = $file->store('shared_files');
        $date = null;
        switch ($request->expiration) {
            case '1h':
                $date = date(now()->addHours(1));
                break;
            case '1d':
                $date = date(now()->addDays(1));
                break;
            case '7d':
                $date = date(now()->addDays(1));
                break;
        }

        $expires_at = $date;
        $sharedFile = SharedFile::create([
            'token' => $token,
            'original_name' => $file->getClientOriginalName(),
            'storage_path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'expiration' => $request->expiration,
            "expires_at" => $expires_at,
        ]);
        if ($sharedFile) return redirect()->route('files.show', $token);
        return Redirect::back()->withErrors(["error" => "Unknow error. Try later."]);
    }

    public function show($token)
    {
        Carbon::setLocale("pt");
        $file = SharedFile::where('token', $token)->firstOrFail();
        $file->expires_at_formated = $file->expires_at->diffForHumans();
        return view('files.show', compact('file'));
    }

    public function download($token)
    {
        $file = SharedFile::where('token', $token)->firstOrFail();
        $date = date_diff(now(), $file->expires_at);

        switch ($file->expiration) {
            case '1h':
                if ($date->invert) {
                    // dd($file->storage_path);
                    if ($date->h <= 0) {
                        Storage::delete($file->storage_path);
                        $file->delete();
                    }
                }
                break;
            case '1d':
                break;
            case '7d':
                break;
            default:
                Storage::delete($file->storage_path);
                $file->delete();
                break;
        }

        // dd($date, $file->expires_at, $file->expiration);
        // if ()
        if (!$file) {
            return view('files.download', [
                'error' => 'Este arquivo expirou e não está mais disponível'
            ]);
        } else {
            return view('files.download', [
                'file' => $file->token
            ]);
        }
    }

    public function downloadFile($token)
    {
        $file = SharedFile::where('token', $token)->firstOrFail();
        if (!$file) {
            return view('files.download', [
                'error' => 'Este arquivo expirou e não está mais disponível'
            ]);
        }
        $file->markAsDownloaded();
        return Storage::download($file->storage_path, $file->original_name);
    }
}
