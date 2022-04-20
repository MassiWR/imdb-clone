@extends('layouts.logged')

@section('content')
    
<div class="flex items-center justify-center relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="text-sm text-left text-white-500 dark:text-gray-400">
        <thead class="text-xs">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-white dark:text-white whitespace-nowrap">
                    {{$LoggedUser['name']}}
                </th>
                <td class="px-6 py-4">
                    {{$LoggedUser['email']}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium dark:text-blue-500 hover:underline mr-2">Edit</a>
                    <a href="#" class="font-medium text-red-800 hover:underline">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection


