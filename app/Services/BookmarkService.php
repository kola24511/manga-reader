<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookmarkService
{
    public function update($bookId, $statusId)
    {
        return DB::table('bookmarks')
            ->updateOrInsert(
                ['user_id' => Auth::id(), 'book_id' => $bookId],
                ['status_id' => $statusId, 'updated_at' => now()]
            );
    }

    public function getUserBookmarks($userId, $filterStatus = null)
    {
        $query = DB::table('bookmarks')
            ->join('books', 'bookmarks.book_id', '=', 'books.id')
            ->join('bookmark_statuses', 'bookmarks.status_id', '=', 'bookmark_statuses.id')
            ->where('bookmarks.user_id', $userId)
            ->select('bookmarks.*', 'books.*', 'bookmark_statuses.name as status_name');

        if ($filterStatus) {
            $query->where('bookmarks.status_id', $filterStatus);
        }

        return $query->get();
    }
}

