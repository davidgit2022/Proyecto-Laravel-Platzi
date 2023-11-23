<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Post') }}
            <a href="{{ route('posts.create')}}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="mb-4">
                        @foreach ($posts as $post)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-6 py-4">{{ $post->title}}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600">Editar</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('posts.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="bg-gray-800 text-white rounded px-4 py-2"
                                        onclick="return confirm('Desea eliminar?')">
                                    </form>
                                <td>
                            </tr>
                        @endforeach
                    </table>
                    {{$posts->links()}}

                    {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Titúlo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="border-b border-gray-200 text-sm">
                                        <td class="px-6 py-4">{{ $post->id }}</td>
                                        <td class="px-6 py-4">{{ $post->title }}</td>
                                        <td class="px-6 py-4">
                                            <a href="" class="text-indigo-600">Editar</a>
                                        </td>
                                        <td class="px-6 py-4">Eliminar</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
