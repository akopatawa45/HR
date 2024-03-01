<x-admin-layout>


    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- content --}}

                <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                    @csrf
                    @method('put')
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit permission</h2>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="username"
                                        class="block text-sm font-medium leading-6 text-gray-900">Permission
                                        Name</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <span
                                                class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Change
                                                to
                                            </span>
                                            <input type="text" name="name" id="name" autocomplete="name"
                                                value="{{ $permission->name }}"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Here...">
                                        </div>
                                        @error('name')
                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                </form>


                {{-- END OF CONTENT --}}
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
