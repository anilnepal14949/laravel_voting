<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All Ideas</span>
        </a>
        <div class="idea-container bg-white rounded-xl mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none mx-4">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Yet another random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category One</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2" x-data="{isOpen: false}">
                            <div class="bg-yellow text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4 text-white">In Progress</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3" @click="isOpen = !isOpen">
                                <svg width="24" height="6" fill="currentColor">
                                    <path d="M2.97.061A2.9692.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"  style="color: rgba(163,163,163,0.5)" />
                                </svg>
                                <ul
                                x-show.transition.origin.top.left.duration.500ms="isOpen"
                                @click.away="isOpen = false"
                                x-cloak
                                @keydown.escape.window="isOpen = false"
                                class="absolute z-10 w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 text-left ml-8">
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Idea Container --}}

        <div class="buttons-container flex items-center justify-between mt-6">
            <div class="flex items-center space-x-4 mx-6">
                <div class="relative" x-data="{isOpen: false}">
                    <button type="button" class="flex items-center justify-center h-11 w-32 text-sm bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white" @click="isOpen = !isOpen">
                        <span class="ml-1">Reply</span>
                    </button>
                    <div
                        x-show.transition.origin.top.left.duration.500ms="isOpen"
                        @click.away="isOpen = false"
                        x-cloak
                        @keydown.escape.window="isOpen = false"
                        class="absolute z-10 w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        <form action="#" class="space-y-4 px-4 py-6">
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Go ahead don't be shy. Share your thoughts..."></textarea>
                            <div class="flex items-center space-x-3">
                                <button type="button" class="flex items-center justify-center h-11 w-1/2 text-sm bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white">
                                    Post Comment
                                </button>
                                <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                    <svg class="text-gray-600 w-4 transform -rotate-45" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="relative" x-data="{isOpen: false}">
                    <button type="button" class="flex items-center justify-center h-11 w-36 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3" @click="isOpen = !isOpen">
                        <span>Set Status</span>
                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div
                        x-show.transition.origin.top.left.duration.500ms="isOpen"
                        @click.away="isOpen = false"
                        x-cloak
                        @keydown.escape.window="isOpen = false"
                        class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                        <form action="#" class="space-y-4 px-4 py-6">
                            <div class="space-y-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" checked="" class="text-gray-300 bg-gray-200 border-none" name="status" value="1">
                                        <span class="ml-2">Open</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" value="2" class="text-purple bg-gray-200 border-none">
                                        <span class="ml-2">Considering</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" value="3" class="text-yellow bg-gray-200 border-none">
                                        <span class="ml-2">In Progress</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" value="4" class="text-green bg-gray-200 border-none">
                                        <span class="ml-2">Implemented</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="status" value="5" class="text-red bg-gray-200 border-none">
                                        <span class="ml-2">Closed</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <textarea name="update_comment" id="update_comment" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
                            </div>
                            <div class="flex items-center justify-between space-x-3">
                                <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                    <svg class="text-gray-600 w-4 transform -rotate-45" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>
                                <button type="button" class="w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 text-white">
                                    <span class="ml-1">Update</span>
                                </button>
                            </div>
                            <div>
                                <label class="font-normal inline-flex items-center">
                                    <input type="checkbox" checked="" class="rounded bg-gray-200" name="notify_voters">
                                    <span class="ml-2">Notify all voters</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div class="text-xl leading-snug">12</div>
                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                </div>
                <button type="button" class="h-11 w-32 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 uppercase transition duration-150 ease-in px-6 py-3">
                    <span>Vote</span>
                </button>
            </div>
        </div>
        {{-- End Buttons Container --}}

        <div class="comments-container space-y-6 ml-22 my-8 mt-1 pt-4">
            <div class="comment-container bg-white rounded-xl mt-4">
                <div class="flex flex-1 px-4 py-6">
                    <div class="flex-none mx-4">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
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
                            <div class="flex items-center space-x-2"  x-data="{isOpen: false}">
                                <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3" @click="isOpen = !isOpen">
                                    <svg width="24" height="6" fill="currentColor">
                                        <path d="M2.97.061A2.9692.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"  style="color: rgba(163,163,163,0.5)" />
                                    </svg>
                                    <ul
                                    x-show.transition.origin.top.left.duration.500ms="isOpen"
                                    @click.away="isOpen = false"
                                    x-cloak
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute z-10 w-44 font-semibold bg-white shadow-dialog rounded-xl py-3 text-left ml-8">
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
