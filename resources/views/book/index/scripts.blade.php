@once
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('bookmarkHandler', ({ bookId, status }) => ({
                    selectedStatus: status,
                    bookId: bookId,

                    saveBookmark() {

                        if (!this.bookId) {
                            console.error('Ошибка: bookId отсутствует!');
                            return;
                        }

                        fetch('/bookmarks', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                book_id: this.bookId,
                                status_id: this.selectedStatus
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.bookmark && data.bookmark.status_id) {
                                    this.selectedStatus = data.bookmark.status_id;
                                } else {
                                    console.error('Ошибка: сервер не вернул корректные данные');
                                }
                            })
                            .catch(error => {
                                console.error('Ошибка запроса:', error);
                            });
                    }
                }));
            });
        </script>
    @endpush
@endonce

