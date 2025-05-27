<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($tasks as $task)
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-5">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">📌 {{ $task->task_title }}</h2>
                <span class="text-xs px-2 py-1 rounded-full
                            {{ $task->status == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($task->status) }}
                </span>
            </div>

            {{-- Task Description --}}
            <p class="text-sm text-gray-700 dark:text-gray-200 mb-2">
                📝 {{ $task->task_description }}
            </p>

            {{-- Marks --}}
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                📊 Marks: <span class="font-semibold text-green-600 dark:text-green-400">{{ @$task->task_marks->obtain_marks }}</span> /
                <span class="text-gray-500 dark:text-gray-400">{{ $task->total_marks }}</span>
            </p>

            {{-- Footer --}}
            <div class="flex justify-between items-center mt-4">
                <span class="text-xs text-gray-500 dark:text-gray-400">
                    📅 Days : {{$task->number_of_days}}
                </span>

                <a href="{{ asset('attachments/' . $task->attachment_link) }}"
                   class="bg-blue-600 text-white text-xs px-3 py-1.5 rounded-md hover:bg-blue-700 transition"
                   download>
                    ⬇️ Download
                </a>
            </div>
        </div>
    @endforeach
</div>
