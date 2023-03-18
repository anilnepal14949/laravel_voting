<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All Ideas</span>
        </a>

        <livewire:idea-show
            :idea="$idea"
            :votesCount="$votesCount"
        />

        <div class="comments-container space-y-6 md:ml-22 my-8 mt-1 pt-4">
            <div class="comment-container bg-white rounded-xl mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                    <div class="flex-none mx-2 md:mx-4">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full mx-2 md:mx-4">
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">Yet another random title can go here</a>
                        </h4> --}}
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2 mt-2 md:mt-0" x-data="{isOpen: false}">
                                <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3" @click="isOpen = !isOpen">
                                    <svg width="24" height="6" fill="currentColor">
                                        <path d="M2.97.061A2.9692.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"  style="color: rgba(163,163,163,0.5)" />
                                    </svg>
                                    <ul
                                    x-show.transition.origin.top.left.duration.500ms="isOpen"
                                    @click.away="isOpen = false"
                                    x-cloak
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute z-10 w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0">
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="is-admin comment-container bg-white rounded-xl mt-4">
                <div class="flex flex-1 px-4 py-6">
                    <div class="flex-none mx-4">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                        <div class="text-center text-blue text-xxs font-semibold uppercase mt-1">Admin</div>
                    </div>
                    <div class="w-full mx-4">
                        <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">Status changed to "Under Consideration"</a>
                        </h4>
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-blue">Andrea</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg width="24" height="6" fill="currentColor">
                                        <path d="M2.97.061A2.9692.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"  style="color: rgba(163,163,163,0.5)" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-container bg-white rounded-xl mt-4">
                <div class="flex flex-1 px-4 py-6">
                    <div class="flex-none mx-4">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full mx-4">
                        {{-- <h4 class="text-xl font-semibold">
                            <a href="#" class="hover:underline">Yet another random title can go here</a>
                        </h4> --}}
                        <div class="text-gray-600 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">John Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg width="24" height="6" fill="currentColor">
                                        <path d="M2.97.061A2.9692.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"  style="color: rgba(163,163,163,0.5)" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Comments Container --}}
    </div>
</x-app-layout>
