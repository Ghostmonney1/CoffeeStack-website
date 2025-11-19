@include('layouts/navbar')

<div class="min-h-screen flex flex-col justify-between bg-white">
    <div class="flex-grow max-w-4xl mx-auto px-4 py-20">
        <h1 class="text-3xl font-bold text-amber-900 mb-6">Topic: {{ ucfirst(str_replace('-', ' ', $slug)) }}</h1>

        <p class="text-gray-700 mb-8">Here you can ask questions and share knowledge about {{ ucfirst(str_replace('-', ' ', $slug)) }}.</p>

        <!-- Ask Question Toggle Button -->
        <button class="bg-amber-700 text-white px-6 py-3 rounded hover:bg-amber-800 transition"
                id="toggleForm">
            Ask a Question
        </button>

        <!-- Hidden Form -->
        <form id="questionForm" action="{{ route('posts.store') }}" method="POST" class="hidden mt-8">
            @csrf

            <input type="hidden" name="topic" value="{{ $slug }}">

            <div class="mb-4">
                <x-input-label for="question" value="Question" class="text-gray-700" />
                <textarea
                    id="question"
                    name="content"
                    required
                    class="block h-28 p-4 w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                ></textarea>
            </div>

            <button type="submit" class="bg-amber-700 text-white px-6 py-3 rounded hover:bg-amber-800 transition">
                Send Question
            </button>
        </form>

        <!-- List of questions -->
        <div class="mt-12">
            @forelse ($posts as $post)
                <div class="border rounded p-4 shadow mb-4">
                    <h2 class="text-xl font-semibold">{{ $post->title ?? 'Untitled Question' }}</h2>
                    <p class="text-gray-700">{{ $post->content }}</p>
                    <p class="text-sm text-gray-500 mt-2">
                        {{ $post->created_at->format('d-m-Y H:i') }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">No questions yet. Be the first to ask!</p>
            @endforelse
        </div>
    </div>

    @include('layouts/footer')

    <script>
        let toggleButton = document.querySelector('#toggleForm');
        let questionForm = document.querySelector('#questionForm');

        toggleButton.addEventListener('click', () => {
            questionForm.classList.toggle('hidden');
            toggleButton.innerHTML = questionForm.classList.contains('hidden')
                ? 'Ask a Question'
                : 'Cancel';
        });
    </script>
</div>
