@extends('layouts.app')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Todo List</h2>
                <a href="{{ route('todos.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add New Todo</a>
            </div>

            @if ($todos->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $todo->title }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        @if ($todo->completed)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <a href="{{ route('todos.show', $todo) }}" class="text-blue-600 hover:text-blue-900 mr-2">View</a>
                                        <a href="{{ route('todos.edit', $todo) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">No todos found. Create one to get started!</p>
            @endif
        </div>
    </div>
@endsection