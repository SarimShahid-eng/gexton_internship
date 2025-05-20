            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6 xl:col-span-7">

                    {{-- <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
                        <div
                            class="rounded-2xl border border-gray-200 bg-white p-8 dark:border-gray-800 dark:bg-white/[0.03] md:p-10">
                            <div class="flex items-center justify-center">
                                <div class="relative w-48 h-48">
                                    <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 100 100">
                                        <circle class="base-circle stroke-gray-300 stroke-4 fill-transparent"
                                            cx="50" cy="50" r="46" />
                                        <circle id="progress-circle"
                                            class="progress-circle stroke-blue-500 stroke-4 fill-transparent transform origin-center -rotate-90"
                                            cx="50" cy="50" r="46" />
                                    </svg>
                                    <div id="countdown"
                                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center text-3xl font-bold text-blue-700">
                                        04:03:00
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .progress-circle {
                            stroke-dasharray: 289.027;
                            /* Circumference of the circle (2 * pi * 46) */
                            stroke-dashoffset: 289.027;
                            transition: stroke-dashoffset 0.3s ease-in-out;
                        }
                    </style>

                    <script>
                        const countdownElement = document.getElementById('countdown');
                        const progressCircle = document.getElementById('progress-circle');
                        const durationInSeconds = 0 * 3600 + 3 * 60 + 0; // Total duration in seconds

                        let startTime;

                        function updateCountdown() {
                            if (!startTime) {
                                startTime = Date.now();
                            }

                            const now = Date.now();
                            const elapsed = now - startTime;
                            const remaining = Math.max(0, durationInSeconds - Math.floor(elapsed / 1000));

                            const hours = Math.floor(remaining / 3600);
                            const minutes = Math.floor((remaining % 3600) / 60);
                            const seconds = remaining % 60;

                            const formattedHours = String(hours).padStart(2, '0');
                            const formattedMinutes = String(minutes).padStart(2, '0');
                            const formattedSeconds = String(seconds).padStart(2, '0');

                            countdownElement.innerText = `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;

                            // Calculate the progress percentage
                            const progress = 1 - (remaining / durationInSeconds);

                            // Calculate the stroke-dashoffset
                            const circumference = 2 * Math.PI * 46;
                            const offset = circumference * progress;

                            progressCircle.style.strokeDashoffset = circumference - offset;

                            if (remaining === 0) {
                                clearInterval(intervalId);
                                countdownElement.innerText = "Expired";
                            }
                        }

                        const intervalId = setInterval(updateCountdown, 1000);
                        updateCountdown(); // Initial call
                    </script> --}}

                    <!-- Metric Group One -->
                    @include('partials.metric-group.metric-group-01')
                    <!-- Metric Group One -->

                    <!-- ====== Chart One Start -->
                    @include('partials.chart.chart-01')
                    {{-- <include src="./partials/chart/chart-01.html" /> --}}
                    <!-- ====== Chart One End -->
                </div>
                <div class="col-span-12 xl:col-span-5">
                    <!-- ====== Chart Two Start -->
                    @include('partials.chart.chart-02')

                    <!-- ====== Chart Two End -->
                </div>

                <div class="col-span-12">
                    <!-- ====== Chart Three Start -->
                    @include('partials.chart.chart-03')

                    <!-- ====== Chart Three End -->
                </div>

                <div class="col-span-12 xl:col-span-5">
                    <!-- ====== Map One Start -->
                    @include('partials.map-01')

                    {{-- <include src="./partials/map-01.html" /> --}}
                    <!-- ====== Map One End -->
                </div>

                <div class="col-span-12 xl:col-span-7">
                    <!-- ====== Table One Start -->
                    @include('partials.table.table-01')

                    {{-- <include src="./partials/table/table-01.html" /> --}}
                    <!-- ====== Table One End -->
                </div>
            </div>
