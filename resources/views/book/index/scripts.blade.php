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

                        fetch(`/books/${this.bookId}/bookmark`, {
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
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Ошибка при обновлении закладки');
                                }
                                console.log('Закладка успешно обновлена');
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

