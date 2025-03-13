@extends('layouts.app')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Todo Details</h2>
                <div>
                    <a href="{{ route('todos.edit', $todo) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">Edit</a>
                    <a href="{{ route('todos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</a>
                </div>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Title</h3>
                <p class="text-gray-700">{{ $todo->title }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Description</h3>
                <p class="text-gray-700">{{ $todo->description ?: 'No description provided.' }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Status</h3>
                @if ($todo->completed)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                @endif
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Created At</h3>
                <p class="text-gray-700">{{ $todo->created_at->format('F d, Y \a\t h:i A') }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Last Updated</h3>
                <p class="text-gray-700">{{ $todo->updated_at->format('F d, Y \a\t h:i A') }}</p>
            </div>

            <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this todo?')">Delete Todo</button>
            </form>
        </div>
    </div>
@endsection