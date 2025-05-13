            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
                        <h5>Create Courses</h5>
                        <div class="space-y-4">
                            <div class="input-group mt-4">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Course Title
                                </label>
                                <input type="text" placeholder="info@gmail.com"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                            </div>
                            <div class="input-group mt-4">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Course Description
                                </label>
                                <textarea placeholder="Enter a description..." type="text" rows="6"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
                            </div>
                            <div class="input-group">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Duration Entry Test Time
                                </label>
                                <div class="flex gap-4"  x-data="{ selected1: false, selected2: false, selected3: false }">
                                    <div class="w-1/3 relative z-20 bg-transparent">
                                        <select @change="selected1 = true"
                                            :class="selected1 && 'text-gray-800 dark:text-white/90'"
                                            class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 dark:bg-dark-900">
                                            <option value="">Select</option>
                                            <option value="1">Marketing</option>
                                            <option value="2">Template</option>
                                            <option value="3">Development</option>
                                        </select>
                                    </div>

                                    <!-- Select 2 -->
                                    <div class="w-1/3 relative z-20 bg-transparent">
                                        <select @change="selected2 = true"
                                            :class="selected2 && 'text-gray-800 dark:text-white/90'"
                                             class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 dark:bg-dark-900">
                                            <option value="">Select</option>
                                            <option value="1">Option A</option>
                                            <option value="2">Option B</option>
                                        </select>
                                    </div>

                                    <!-- Select 3 -->
                                    <div class="w-1/3 relative z-20 bg-transparent">
                                        <select @change="selected3 = true"
                                            :class="selected3 && 'text-gray-800 dark:text-white/90'"
                                            class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 dark:bg-dark-900">
                                            <option value="">Select</option>
                                            <option value="1">Value 1</option>
                                            <option value="2">Value 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
