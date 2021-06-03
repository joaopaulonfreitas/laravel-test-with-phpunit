<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    

                    @if(session('status'))
                    {{ session('status') }}
                    @endif

                    <table class="w-full divide-y divide-y-1">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-3 py-2">Product name</th>
                                <th class="px-3 py-2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="px-3 py-2">{{ $product->name }}</td>
                                <td class="px-3 py-2">{{ $product->price }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="px-3 py-2">No products found.</td>                                
                            </tr>
                            @endforelse
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
