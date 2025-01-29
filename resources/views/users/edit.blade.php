<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">
<div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
            	<div class="bg-white shadow-md rounded-lg px-8 py-6 w-2xl">
    <div class="mx-auto mt-12 p-16">
        <h2 class="text-2xl font-bold mb-4">Edit User: {{ $user->name }}</h2>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="spot_usd" class="block text-sm font-medium text-gray-700">Spot (USD)</label>
                <input type="text" id="spot_usd" name="spot_usd" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('spot_usd', $user->spot_usd) }}">
                @error('spot_usd')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="spot_percentage" class="block text-sm font-medium text-gray-700">Spot (Percentage)</label>
                <input type="text" id="spot_percentage" name="spot_percentage" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('spot_percentage', $user->spot_percentage) }}">
                @error('spot_percentage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="margin_usd" class="block text-sm font-medium text-gray-700">Margin (USD)</label>
                <input type="text" id="margin_usd" name="margin_usd" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('margin_usd', $user->margin_usd) }}">
                @error('margin_usd')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="margin_percentage" class="block text-sm font-medium text-gray-700">Margin (Percentage)</label>
                <input type="text" id="margin_percentage" name="margin_percentage" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('margin_percentage', $user->margin_percentage) }}">
                @error('margin_percentage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="futures_usd" class="block text-sm font-medium text-gray-700">Futures (USD)</label>
                <input type="text" id="futures_usd" name="futures_usd" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('futures_usd', $user->futures_usd) }}">
                @error('futures_usd')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="futures_percentage" class="block text-sm font-medium text-gray-700">Futures (Percentage)</label>
                <input type="text" id="futures_percentage" name="futures_percentage" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('futures_percentage', $user->futures_percentage) }}">
                @error('futures_percentage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="buy_sell_usd" class="block text-sm font-medium text-gray-700">Buy & Sell (USD)</label>
                <input type="text" id="buy_sell_usd" name="buy_sell_usd" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('buy_sell_usd', $user->buy_sell_usd) }}">
                @error('buy_sell_usd')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="buy_sell_percentage" class="block text-sm font-medium text-gray-700">Buy & Sell (Percentage)</label>
                <input type="text" id="buy_sell_percentage" name="buy_sell_percentage" class="shadow-sm rounded-md w-full px-3 py-2 border" value="{{ old('buy_sell_percentage', $user->buy_sell_percentage) }}">
                @error('buy_sell_percentage')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save Changes</button>
        </form>
    </div>
 </div> </div> </div>
</body>
</html>
