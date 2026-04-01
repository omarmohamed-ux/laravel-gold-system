<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            {{ __('الصفحة الرئيسية - لوحة التحكم ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right" dir="rtl">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border-r-4 border-green-500">
                    <p class="text-xs text-gray-500 font-bold">إجمالي المبيعات</p>
                    <p class="text-xl font-black text-green-700">
                        {{ number_format($transactions->where('type', 'sale')->sum('sale_price'), 2) }} ر.س
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-r-4 border-orange-500">
                    <p class="text-xs text-gray-500 font-bold">إجمالي المشتريات</p>
                    <p class="text-xl font-black text-orange-700">
                        {{ number_format($transactions->where('type', 'purchase')->sum('sale_price'), 2) }} ر.س
                    </p>
                </div>

                @php 
                    $net = $transactions->where('type', 'sale')->sum('sale_price') - $transactions->where('type', 'purchase')->sum('sale_price');
                @endphp
                <div class="bg-white p-6 rounded-xl shadow-sm border-r-4 {{ $net >= 0 ? 'border-blue-500' : 'border-red-500' }}">
                    <p class="text-xs text-gray-500 font-bold">صافي السيولة (الصفحة الحالية)</p>
                    <p class="text-xl font-black {{ $net >= 0 ? 'text-blue-700' : 'text-red-700' }}">
                        {{ number_format($net, 2) }} ر.س
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-4 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="font-bold text-gray-700">آخر العمليات المسجلة</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-right">
                        <thead>
                            <tr class="bg-gray-100/50 text-gray-600 font-bold text-sm border-b">
                                <th class="px-6 py-4">الصورة</th>
                                <th class="px-6 py-4">التاريخ</th>
                                <th class="px-6 py-4">العميل</th>
                                <th class="px-6 py-4">النوع</th>
                                <th class="px-6 py-4">العيار/الوزن</th>
                                <th class="px-6 py-4">المبلغ</th>
                                <th class="px-6 py-4">الموظف</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($transactions as $item)
                            <tr class="hover:bg-blue-50/30 transition">
                                <td class="px-6 py-3">
                                    @if($item->product_image)
                                        <img src="{{ asset('storage/' . $item->product_image) }}" 
                                            class="w-14 h-14 object-cover rounded-lg border border-gray-200 shadow-sm hover:scale-110 transition cursor-pointer"
                                            onclick="window.open(this.src)">
                                    @else
                                        <div class="w-14 h-14 bg-gray-50 rounded-lg flex items-center justify-center text-[10px] text-gray-400 border border-dashed">بلا صورة</div>
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-sm text-gray-500">{{ $item->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-3">
                                    <div class="font-bold text-gray-800">{{ $item->customer_name }}</div>
                                    <div class="text-xs text-gray-400">{{ $item->phone }}</div>
                                </td>
                                <td class="px-6 py-3">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $item->type == 'sale' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                        {{ $item->type == 'sale' ? 'بيع' : 'شراء' }}
                                    </span>
                                </td>
                                <td class="px-6 py-3 text-sm">
                                    <span class="text-gray-600">عيار {{ $item->karat }}</span><br>
                                    <span class="font-extrabold text-gray-900">{{ $item->weight }} جم</span>
                                </td>
                                <td class="px-6 py-3">
                                    <span class="font-black text-blue-700">{{ number_format($item->sale_price, 2) }}</span>
                                    <span class="text-xs text-blue-400 font-bold">ر.س</span>
                                </td>
                                <td class="px-6 py-3 text-xs text-gray-400 font-medium">{{ $item->staff_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if($transactions->hasPages())
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        {{ $transactions->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>    

</x-app-layout>