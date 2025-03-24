<?php

namespace App\Http\Controllers;

use App\Services\BookmarkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    protected BookmarkService $bookmarkService;

    public function __construct(BookmarkService $bookmarkService)
    {
        $this->bookmarkService = $bookmarkService;
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'status_id' => 'nullable|exists:bookmark_statuses,id',
        ]);

        $bookmark = $this->bookmarkService->update($request->book_id, $request->status_id);

        return response()->json(['message' => 'Закладка обновлена'], 200);


        /*
        return response()->json([
            'message' => 'Закладка обновлена',
            'bookmark' => [
                'book_id' => $bookmark->book_id,
                'status_id' => $bookmark->status_id,
                'updated_at' => $bookmark->updated_at,
            ]
        ]);
        */
    }
}
