<?php

namespace App\Livewire;

use App\Models\GoldTransaction;
use App\Models\Customer;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GoldTransactionForm extends Component
{
    use WithFileUploads;

    // 1. يجب تعريف $type هنا ليقبل الـ Validation
    public $customer_name, $phone, $id_number, $birth_date, $id_version;
    public $shop_name, $staff_name, $weight, $karat, $sale_price, $product_image, $type;

    
    public function save()
    {
        // 2. التحقق من الحقول
        $this->validate([
            'customer_name' => 'required|string|min:3',
            'phone'         => 'required',
            'id_number'     => 'required',
            'id_version'    => 'required',
            'weight'        => 'required|numeric',
            'karat'         => 'required',
            'sale_price'    => 'required|numeric',
            'shop_name'     => 'required',
            'staff_name'    => 'required',
            'type'          => 'required|in:sale,purchase', // الآن سيعمل لأننا عرفنا المتغير فوق
        ]);

        // 3. البحث عن العميل
        $customer = Customer::where('id_number', $this->id_number)->first();

        if ($customer) {
            // توحيد التواريخ للمقارنة (حل مشكلة الرفض الخاطئ)
            $storedDate = $customer->birth_date ? Carbon::parse($customer->birth_date)->format('Y-m-d') : null;
            $inputDate = $this->birth_date ? Carbon::parse($this->birth_date)->format('Y-m-d') : null;

            if (
                trim($customer->customer_name) !== trim($this->customer_name) ||
                trim($customer->phone)         !== trim($this->phone) ||
                trim($customer->id_version)    !== trim($this->id_version) ||
                $storedDate !== $inputDate
            ) {
                $this->dispatch('swal:error', [
                    'message' => 'البيانات لا تطابق سجل العميل (الاسم المسجل: ' . $customer->customer_name . ')'
                ]);
                return;
            }
        } else {
            // إنشاء عميل جديد
            try {
                $customer = Customer::create([
                    'customer_name' => $this->customer_name,
                    'id_number'     => $this->id_number,
                    'phone'         => $this->phone,
                    'id_version'    => $this->id_version,
                    'birth_date'    => $this->birth_date,
                ]);
            } catch (\Exception $e) {
                $this->dispatch('swal:error', ['message' => 'رقم نسخة الهوية مكرر لشخص آخر!']);
                return;
            }
        }

        // 4. معالجة الصورة
        $imagePath = $this->product_image ? $this->product_image->store('gold-products', 'public') : null;

        // 5. الحفظ النهائي (إضافة customer_id)
        GoldTransaction::create([
            'customer_id'   => $customer->id,
            'type'          => $this->type,
            'customer_name' => $this->customer_name,
            'phone'         => $this->phone,
            'id_number'     => $this->id_number,
            'id_version'    => $this->id_version,
            'birth_date'    => $this->birth_date,
            'shop_name'     => $this->shop_name,
            'staff_name'    => $this->staff_name,
            'weight'        => $this->weight,
            'karat'         => $this->karat,
            'sale_price'    => $this->sale_price,
            'product_image' => $imagePath,
            'user_id'       => Auth::id(),
        ]);

        $this->dispatch('swal:success', ['message' => 'تم حفظ العملية بنجاح']);
        $this->reset();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.gold-transaction-form');
    }
}