<div dir="rtl" class="font-sans">
    <div class="bg-gray-50 min-h-screen py-10 px-4">

            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-700 px-8 py-6 rounded-none md:rounded-lg text-center">
                <h2 class="text-xl font-bold text-black">نموذج شراء ذهب من عميل (مستعمل/كسر)</h2>
                <p class="text-blue-100 mt-1 text-sm">
                    يرجى تعبئة كافة التفاصيل بدقة لضمان صحة السجلات
                </p>
                <p class="text-blue-100 mt-1 text-sm">
                    تأكد من التحقق من هوية العميل ووزن الذهب بدقة قبل إتمام الصرف
                </p>
            </div>

            <form wire:submit.prevent="save" enctype="multipart/form-data" class="p-8">
                <h1 class="text-lg font-bold text-gray-800 col-span-full"> معلومات العميل(البائع)</h1>
                                    <hr class="col-span-full border-gray-300 my-6" />

                <!-- Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- اسم العميل -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-800">
                            اسم العميل الثلاثي(البائع)
                        </label>
                        <input type="text"
                               wire:model="customer_name"
                               placeholder="مثال: عمر محمد المتولي"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                        @error('customer_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- رقم الجوال -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                            رقم الجوال
                        </label>
                        <input type="text"
                               wire:model="phone"
                               placeholder="05xxxxxxxx"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('phone')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- رقم الهوية -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                            رقم الهوية / الإقامة
                        </label>
                        <input type="text"
                               wire:model="id_number"
                               placeholder="1010xxxxxx"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('id_number')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- نسخة الهوية -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                            رقم نسخة الهوية / الإقامة
                        </label>
                        <input type="text"
                               wire:model="id_version"
                               placeholder="1010xxxxxx"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('id_version')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr class="col-span-full border-gray-300 my-6" />

                    <h1 class="text-lg font-bold text-gray-800 col-span-full">معلومات المنتج</h1>

                    <!-- اسم المحل -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-800">
                            اسم المحل (المشتري)
                        </label>
                        <input type="text"
                               wire:model="shop_name"
                               placeholder="اسم المحل"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('shop_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- الموظف -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                            اسم الموظف
                        </label>
                        <input type="text"
                               wire:model="staff_name"
                               placeholder="اسمك الكامل"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('staff_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- الوزن -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                            الوزن
                        </label>
                        <input type="text"
                               wire:model="weight"
                               placeholder="مثال: 100 جرام"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('weight')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- العيار -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                            العيار
                        </label>
                        <select wire:model="karat"
                                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                            <option value="">اختر العيار</option>
                            <option value="18">18</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="24">24</option>
                        </select>
                        @error('karat')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- سعر البيع -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-800">
                           المبلغ المدفوع للعميل (سعر البيع)
                        </label>
                        <input type="text"
                               wire:model="sale_price"
                               placeholder="0.00 ريال"
                               class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:ring-2 focus:ring-indigo-600">
                        @error('sale_price')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- صورة المنتج -->
                    <div class="col-span-full">
                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">تصوير الذهب المستلم</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                    <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-300">
                                        <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-600 hover:text-indigo-500">
                                    <span>التقط صورة او ارفع ملف</span>
                                    <input id="file-upload" 
                                        name="file-upload" 
                                        type="file" 
                                        wire:model="product_image" 
                                        accept="image/*" 
                                        capture="environment" 
                                        class="sr-only" />
                                        <div wire:loading wire:target="product_image" class="mt-2 text-sm text-blue-600 font-bold">
                                        <div class="flex items-center">
                                                <svg class="animate-spin h-4 w-4 ml-2" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                                جاري رفع الصورة... يرجى الانتظار
                                            </div>
                                        </div>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF الى 10MB</p>
                            </div>
                        </div>
                    </div>
                    <hr class="col-span-full border-gray-300 my-6" />

                </div>

                <!-- زر الحفظ -->
                    <button type="button" 
                        onclick="confirmSave()"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        حفظ
                    </button>
                    <script>
                        function confirmSave() {
                            Swal.fire({
                                title: 'هل أنت متأكد؟',
                                text: "سيتم تسجيل هذه العملية في النظام فوراً",
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#1e40af', 
                                cancelButtonColor: '#6b7280',
                                confirmButtonText: 'نعم، قم بالحفظ',
                                cancelButtonText: 'تراجع',
                                reverseButtons: true // لجعل "تأكيد" على اليمين بما أن الواجهة RTL
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // هنا نرسل الأمر لـ Livewire لتنفيذ دالة save
                                    @this.save(); 
                                }
                            })
                        }

                        // لسماع رسالة النجاح بعد الحفظ وإظهار تنبيه جميل
                        window.addEventListener('swal:success', event => {
                            Swal.fire({
                                title: 'تم الحفظ!',
                                text: event.detail.message,
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false
                            }).then(() => { // بعد إغلاق التنبيه، نعيد تحميل الصفحة لتحديث البيانات
                                setTimeout(() => {
                                window.location.reload(); 
                            }, 250);
                            });
                        });
                        

                    </script>
            </form>
            
        </div>
    </div>
</div>