@include('layouts/navbar')

<div class="min-h-screen flex flex-col justify-between bg-white">
    <div class="flex-grow max-w-4xl mx-auto px-4 py-20">
        <h1 class="text-3xl font-bold text-amber-900 mb-6">Topic: {{ ucfirst(str_replace('-', ' ', $slug)) }}</h1>

        <p class="text-gray-700 mb-8">Here you can ask questions and share knowledge about {{ ucfirst(str_replace('-', ' ', $slug)) }}.</p>

            @csrf

            <!-- Text Invoer -->
            <div>
                <x-input-label for="question" value="Question" class="text-gray-700" />
                <textarea
                    id="question"
                    type="text"
                    name="question"
                    value="old('question')"
                    required autofocus
                    class="block h-20 p-4 w-full mt-1 border-gray-300 rounded-md focus:ring-amber-600 focus:border-amber-600"
                ></textarea>

            </div>




            <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-gray-300">
{
            </div>


        <form>
        <a href="#" class="inline-block bg-amber-700 text-white px-6 py-3 rounded hover:bg-amber-800 transition mt-4" id="toggleForm">Ask a Question</a>

        <div class="mt-10">
            <p class="text-gray-500">No questions yet. Be the first to ask!</p>
        </div>
    </form>
    </div>

    @include('layouts/footer')

    <script type="text/javascript">
        let toggleButton = document.querySelector('#toggleForm');
        let questionForm = document.querySelector('#questionForm');

        toggleButton.addEventListener('click', (event) => {
            event.preventDefault();

            if(!questionForm.classList.contains('hidden')) {
                questionForm.submit();
            }

            questionForm.classList.toggle('hidden');
            if(questionForm.classList.contains('hidden')) {
                toggleButton.innerHTML = 'Ask a Question';
            } else {
                toggleButton.innerHTML = 'Send question';
            }
        });
    </script>
</div>
