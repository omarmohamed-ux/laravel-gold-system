<?php

namespace App\Livewire;
use App\Models\GoldTransaction;
use Livewire\WithFileUploads; // ضروري لرفع الصور
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PurchaseForm extends Component
{
     use WithFileUploads;

    // تعريف المتغيرات لتطابق الـ wire:model في الـ Blade
    public $customer_name, $phone, $id_number, $birth_date, $id_version;
    public $shop_name, $staff_name, $weight, $karat, $sale_price, $product_image;

    public function save(){
        // 1. التحقق من البيانات
        $validatedData = $this->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'id_number' => 'required',
            'weight' => 'required|numeric',
            'karat' => 'required',
            'sale_price' => 'required|numeric',
            'product_image' => 'nullable|image|max:2048', // 2MB max
            //dd($this->product_image)
        ]);

        $imagePath = null;
        if ($this->product_image) {
            // سيقوم بتخزينها في مجلد storage/app/public/gold-products
            $imagePath = $this->product_image->store('gold-products', 'public');
        }
        // 3. الحفظ في الجدول
        GoldTransaction::create([
            'type' => 'purchase', // تحديد نوع العملية
            'customer_name' => $this->customer_name,
            'phone' => $this->phone,
            'id_number' => $this->id_number,
            'birth_date' => $this->birth_date,
            'id_version' => $this->id_version,
            'shop_name' => $this->shop_name,
            'staff_name' => $this->staff_name,
            'weight' => $this->weight,
            'karat' => $this->karat,
            'sale_price' => $this->sale_price,
            'product_image' => $imagePath,
            'user_id' => Auth::id(), // الموظف الحالي
        ]);

        $this->dispatch('swal:success', [
        'message' => 'تم حفظ بيانات الذهب بنجاح'
    ]);

    $this->reset(); // لتفريغ الحقول بعد النجاح
    }
    public function render()
    {
        return view('livewire.purchase-form');
    }
}
