            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    <div x-data="{ showCourseForm: false }"
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
                        <h5 class="flex justify-between items-center text-lg font-semibold">
                            Create Courses

                            <!-- Toggle Button -->
                            <button @click="showCourseForm = !showCourseForm"
                                class="transition-transform hover:rotate-90">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </h5>

                        <!-- Form Section -->
                        <div x-show="showCourseForm" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="space-y-4 mt-4">

                            <!-- Course Title -->
                            <div class="input-group">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Course Title
                                </label>
                                <input type="text" placeholder="info@gmail.com"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>

                            <!-- Course Description -->
                            <div class="input-group">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Course Description
                                </label>
                                <textarea placeholder="Enter a description..." rows="6"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
                            </div>

                            <!-- Selects Row -->
                            <div class="input-group">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Duration Entry Test Time
                                </label>
                                <div class="flex gap-4" x-data="{ selected1: false, selected2: false, selected3: false }">
                                    <template x-for="(selected, index) in [selected1, selected2, selected3]"
                                        :key="index">
                                        <div class="w-1/3 relative z-20 bg-transparent">
                                            <select :class="selected && 'text-gray-800 dark:text-white/90'"
                                                class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 dark:bg-dark-900"
                                                @change="index === 0 ? selected1 = true : index === 1 ? selected2 = true : selected3 = true">
                                                <option value="">Select</option>
                                                <option value="1">Option A</option>
                                                <option value="2">Option B</option>
                                            </select>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button
                                    class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
                        <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                    See All Courses
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
                                                    ID
                                                </p>
                                            </div>
                                        </th>
                                        <th class="py-3">
                                            <div class="flex items-center">
                                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                    Course
                                                </p>
                                            </div>
                                        </th class="py-3">
                                        <th class="py-3">
                                            <div class="flex items-center">
                                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                    Price
                                                </p>
                                            </div>
                                        </th>
                                        <th class="py-3">
                                            <div class="flex items-center col-span-2">
                                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                    Status
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
                                    <tr>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <div class="flex items-center gap-3">
                                                    <div class="h-[50px] w-[50px] overflow-hidden rounded-md">
                                                        <img src="./images/product/product-01.jpg" alt="Product" />
                                                    </div>
                                                    <div>
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            Macbook pro 13”
                                                        </p>
                                                        <span class="text-gray-500 text-theme-xs dark:text-gray-400">
                                                            2 Variants
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                    Laptop
                                                </p>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                    $2399.00
                                                </p>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center">
                                                <p
                                                    class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                                    Delivered
                                                </p>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="flex items-center gap-2">
                                                <!-- Edit Button -->
                                                <a href="#"
                                                    class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600"
                                                    title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.313l-4.5 1.125 1.125-4.5 12.737-12.45z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Button -->
                                                <a href="#"
                                                    class="inline-flex items-center text-sm text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                            clip-rule="evenodd" />
                                                    </svg>


                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- table item -->

                                    <!-- table body end -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
