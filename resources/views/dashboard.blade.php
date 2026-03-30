<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            {{ __('الصفحة الرئيسية - لوحة التحكم ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 text-right" dir="rtl">
                <div class="bg-white p-6 rounded-lg shadow border-r-4 border-green-500">
                    <p class="text-sm text-gray-900">السلام عليكم </p>
                    <p class="text-2xl font-bold text-gray-800"></p>
                </div>
        </div>
    </div>    

</x-app-layout>