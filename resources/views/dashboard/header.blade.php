<section class="pt-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <img class="w-32 h-32 object-fill mx-auto"
             src="{{ Auth::user()->avatar_url ?
                  asset('storage/' . Auth::user()->avatar_url) :
                  asset('images/default-avatar.png') }}" alt="Обложка книги">
    </div>
</section>
