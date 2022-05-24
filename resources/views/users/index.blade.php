@extends('posts.layout')

@section('content')

<div class="max-w-4xl mx-auto mt-8">

    <div class="mb-4">
        <h1 class="text-3xl font-bold text-center">
            List of Users
        </h1>
    </div>

    <div class="flex flex-col mt-10">
        <div class="flex flex-col">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                @if ( $message = Session::get('success'))
                <div class="p-3 rounded bg-green-500 text-green-100 mb-4 m-3">
                    <span>{{ $message }}</span>
                </div>
                @endif
                <table class="min-w-full">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">No</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Avatar</th>
                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Action</th>
                    </tr>
                    <tbody class="bg-white">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ ++$i }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"><img src="{{ $user->avatar }}" width="50px"></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="flex justify-center">
                                        <div class="mb-3 w-96">
                                        <input class="form-control block
                                        w-full px-2 py-1 text-sm font-normal text-gray-700 bg-white bg-clip-padding
                                        border border-solid border-gray-300 rounded
                                        transition ease-in-out m-0
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm" type="file" name="avatar">
                                        </div>
                                        <div class="ml-2">
                                            <button type="submit" class="inline-block px-4 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection