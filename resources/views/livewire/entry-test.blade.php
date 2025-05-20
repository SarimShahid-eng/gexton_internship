<div class="max-w-6xl mx-auto mt-2 space-y-8">
    <!-- Card 1: Course Name + Countdown Timer -->
    <div class="flex items-center justify-between px-6 py-3 bg-white dark:bg-gray-800 rounded-xl shadow-md">
        <!-- Course Name -->
        <div class="text-xl font-semibold text-gray-800 dark:text-white">
            Introduction to Biology
        </div>

        <!-- Countdown Timer with ring -->
        <div class="relative w-32 h-32">
            <!-- Background Ring -->
            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 40 40">
                <!-- Outer Ring -->
                <circle class="text-gray-300 dark:text-gray-600" stroke="currentColor" stroke-width="1" fill="none"
                    cx="20" cy="20" r="17" />
                <!-- Progress Ring -->
                <circle id="progress-ring" class="text-blue-500" stroke="currentColor" stroke-width="1" fill="none"
                    stroke-linecap="round" cx="20" cy="20" r="17" stroke-dasharray="107"
                    stroke-dashoffset="0" />
            </svg>

            <!-- Countdown Text -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 py-4">
                <div class="text-lg font-semibold text-gray-800 dark:text-white leading-tight" id="countdown-text"
                    style="line-height: 1.1;">
                    15 mins - 00 sec
                </div>
            </div>
        </div>


    </div>

    <!-- Card 2: Question count + MCQ -->
    <div class="max-w-6xl mx-auto  py-6 px-8 bg-white dark:bg-gray-800 rounded-xl shadow-md">
        <!-- Question Number -->
        <div class="flex items-center mb-6">
            <div class="px-4 py-3 rounded-lg  text-lg font-semibold   dark:text-gray-300 text-blue-500">
              Question  1 <span class="">out of</span> 50
            </div>
        </div>



        <!-- Question -->
        <h2 class="mb-6 text-lg font-medium text-gray-800 dark:text-white">
            What is the powerhouse of the cell?
        </h2>

        <!-- Options -->
        <div class="space-y-4">
            @foreach (['A. Nucleus', 'B. Mitochondria', 'C. Ribosome', 'D. Golgi Apparatus'] as $index => $option)
                <label
                    class="flex items-center p-4 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                    <input type="radio" name="option" value="{{ chr(65 + $index) }}"
                        class="form-radio text-blue-600 mr-4">
                    <span class="text-gray-700 dark:text-gray-200">{{ $option }}</span>
                </label>
            @endforeach
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-right">
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Submit
            </button>
        </div>
    </div>
</div>
