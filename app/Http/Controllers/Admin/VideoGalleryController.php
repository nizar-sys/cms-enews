<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\VideoGalleryDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
    public function index(VideoGalleryDataTable $dataTable)
    {
        return $dataTable->render('admin.video-gallery.index');
    }

    public function create()
    {
        return view('admin.video-gallery.create');
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

        $videoGallery = new VideoGallery();
        $videoGallery->title = $request->title;
        $videoGallery->url = $url;
        $videoGallery->save();

        toastr()->success('Video Gallery created successfully');
        return redirect()->route('admin.video-gallery.index');
    }

    public function edit($id)
    {
        $video = VideoGallery::find($id);
        return view('admin.video-gallery.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);
    
        $videoGallery = VideoGallery::find($id);
    
        if (!$videoGallery) {
            toastr()->error('Video Gallery not found');
            return redirect()->route('admin.video-gallery.index');
        }
    
        $url = $request->url;
    
        // Check if the URL already contains 'embed'
        if (strpos($url, 'embed') === false) {
            // Convert to embed URL if necessary
            $url = $this->convertToEmbedUrl($url);
        }
    
        $videoGallery->title = $request->title;
        $videoGallery->url = $url;
        $videoGallery->save();
    
        toastr()->success('Video Gallery updated successfully');
        return redirect()->route('admin.video-gallery.index');
    }

    public function destroy($id)
    {
        $video = VideoGallery::findOrfail($id);

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
