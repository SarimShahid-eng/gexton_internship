<div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-12">
        <div x-data="{ showCourseForm: false }"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
            <h5 class="flex justify-between items-center text-lg font-semibold">
                Create Group

                <!-- Toggle Button -->
                <button @click="showCourseForm = !showCourseForm" class="transition-transform hover:rotate-90">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </h5>
            <form wire:submit.prevent="save" x-data="answerComponent()" x-init="init()">
                <!-- Form Section -->
                <div x-show="showCourseForm" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="space-y-4 mt-4">
                    <!-- Select Course -->
                    <div class="input-group">
                        <label for="course" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Select Course
                        </label>
                        <select wire:model="course_id"
                            class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800
                                                    shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10
                                                    dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                            <option value="">Select a course</option>
                            <!-- Populate with actual courses -->
                            <option value="1">Course 1</option>
                            <option value="2">Course 2</option>
                            <option value="3">Course 3</option>
                        </select>
                    </div>


                    <!-- Question Title -->
                    <div class="input-group">
                        <label for="title" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Question Title
                        </label>
                        <input type="text" wire:model="title" placeholder="Enter question title"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800
                                 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800
                                 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white/90
                                 dark:placeholder:text-white/30" />
                    </div>

                    <!-- Session -->
                    <div class="input-group">
                        <label for="session" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Session
                        </label>
                        <input type="text" wire:model="session_id" placeholder="e.g., 2024"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800
                                 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800
                                 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white/90
                                 dark:placeholder:text-white/30" />
                    </div>

                    <!-- Question -->
                    <div class="input-group">
                        <label for="question" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Question
                        </label>
                        <textarea wire:model="question" placeholder="Enter the question here"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800
                                    h-32 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800
                                    placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white/90
                                    dark:placeholder:text-white/30"></textarea>
                    </div>

                    <div x-data="{
                        options: [''],
                        correct_answer: null,
                        updateLivewire() {
                            $refs.optionsInput.value = JSON.stringify(this.options);
                            $refs.correctInput.value = this.correct_answer;
                            // Manually dispatch input event to notify Livewire of changes
                            $refs.optionsInput.dispatchEvent(new Event('input'));
                            $refs.correctInput.dispatchEvent(new Event('input'));
                        },
                        addOption() {
                            this.options.push('');
                            this.updateLivewire();
                        },
                        removeOption(index) {
                            this.options.splice(index, 1);
                            // Adjust correct_answer if needed
                            if (this.correct_answer === index) {
                                this.correct_answer = null;
                            } else if (this.correct_answer > index) {
                                this.correct_answer--;
                            }
                            this.updateLivewire();
                        }
                    }" x-init="updateLivewire()"
                        class="w-full mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                        <input type="hidden" x-ref="optionsInput" x-model="options" @input="updateLivewire()" />
<input type="hidden" x-ref="correctInput" x-model="correct_answer" @input="updateLivewire()" />

                        <div class="input-group space-y-6">
                            <div class="flex items-center justify-between">
                                <label class="text-base font-semibold text-gray-800 dark:text-gray-200">Add your
                                    options</label>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Mark one as correct</span>
                            </div>

                            <template x-for="(answer, index) in options" :key="index">
                                <div
                                    class="group relative flex items-center gap-4 mb-4 p-3 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-blue-200 dark:hover:border-blue-800 hover:shadow-sm">
                                    <!-- Answer Input -->
                                    <div class="flex-1">
                                        <input type="text" x-model="options[index]" @input="updateLivewire()"
                                            placeholder="Enter answer option"
                                            class="w-full px-4 py-3 text-gray-800 dark:text-white bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 focus:border-blue-400 focus:ring-blue-100 transition-all focus:outline-none placeholder:text-gray-400 dark:placeholder:text-gray-500" />
                                    </div>

                                    <!-- Correct Answer Radio -->
                                    <div class="flex items-center gap-2 px-3">
                                        <input type="radio" :value="index" x-model="correct_answer"
                                            @change="updateLivewire()" class="h-5 w-5 text-blue-600 cursor-pointer"
                                            :name="'correct_answer'" />
                                        <span
                                            class="text-sm font-medium text-gray-700 dark:text-gray-300">Correct</span>
                                    </div>

                                    <!-- Remove Button -->
                                    <button type="button" @click="removeOption(index)" x-show="options.length > 1"
                                        class="text-red-500 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full p-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </template>

                            <!-- Add Another Answer -->
                            <button type="button" @click="addOption()"
                                class="mt-4 px-4 py-2.5 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                                + Add Another Answer
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="col-span-12 space-y-6 xl:col-span-12">
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
            <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        See All Group
                    </h3>
                </div>

            </div>

            <div class="w-full overflow-x-auto">
                <table class="min-w-full">
                    <!-- table header start -->
                    <thead>

                        <tr class="border-gray-100 border-y dark:border-gray-800">
                            <th class="py-3">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Created Date
                                    </p>
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Group Name
                                    </p>
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Teacher Name
                                    </p>
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Course Title
                                    </p>
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex items-center col-span-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Timings
                                    </p>
                                </div>
                            </th>
                            </th>
                            <th class="py-3">
                                <div class="flex items-center col-span-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Session
                                    </p>
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex items-center col-span-2">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Action
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <!-- table header end -->

                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function answerComponent() {
        return {
            options: [''],
            correct_answer: null,

            init() {
                this.updateLivewire();
            },

            updateLivewire() {
                $refs.optionsInput.value = JSON.stringify(this.options);
                $refs.correctInput.value = JSON.stringify([this.options[this.correct_answer] ?? '']);
                $refs.optionsInput.dispatchEvent(new Event('input'));
                $refs.correctInput.dispatchEvent(new Event('input'));
            }
        }
    }
</script>
