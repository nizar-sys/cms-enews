<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VideoProjectDataTable;
use App\Http\Controllers\Controller;
use App\Models\VideoProject;
use Illuminate\Http\Request;

class VideoProjectController extends Controller
{
    public function index(VideoProjectDataTable $dataTable)
    {
        return $dataTable->render('admin.video-project.index');
    }

    public function create()
    {
        return view('admin.video-project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $url = $request->url;

        // Check if the URL already contains 'embed'
        if (strpos($url, 'embed') === false) {
            // Convert to embed URL if necessary
            $url = $this->convertToEmbedUrl($url);
        }

        $videoProject = new VideoProject();
        $videoProject->title = $request->title;
        $videoProject->url = $url;
        $videoProject->save();

        toastr()->success('Video Project created successfully');
        return redirect()->route('admin.video-project.index');
    }

    public function edit($id)
    {
        $video = VideoProject::find($id);
        return view('admin.video-project.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $videoProject = VideoProject::find($id);

        if (!$videoProject) {
            toastr()->error('Video Project not found');
            return redirect()->route('admin.video-project.index');
        }

        $url = $request->url;

        // Check if the URL already contains 'embed'
        if (strpos($url, 'embed') === false) {
            // Convert to embed URL if necessary
            $url = $this->convertToEmbedUrl($url);
        }

        $videoProject->title = $request->title;
        $videoProject->url = $url;
        $videoProject->save();

        toastr()->success('Video Project updated successfully');
        return redirect()->route('admin.video-project.index');
    }

    public function destroy($id)
    {
        $video = VideoProject::findOrfail($id);

        $video->delete();
    }

    /**
     * Convert YouTube URL to embed URL
     *
     * @param string $url
     * @return string
     */
    private function convertToEmbedUrl($url)
    {
        $parsedUrl = parse_url($url);

        // Handle YouTube short URL (youtu.be)
        if ($parsedUrl['host'] === 'youtu.be') {
            $videoId = substr($parsedUrl['path'], 1); // Remove leading slash
        } elseif ($parsedUrl['host'] === 'www.youtube.com' && isset($parsedUrl['query'])) {
            // Handle standard YouTube URL (youtube.com/watch?v=...)
            parse_str($parsedUrl['query'], $queryParams);
            $videoId = $queryParams['v'] ?? null;
        } else {
            // Return the original URL if it doesn't match expected YouTube URL patterns
            return $url;
        }

        // Construct the embed URL
        return 'https://www.youtube.com/embed/' . $videoId;
    }
}
