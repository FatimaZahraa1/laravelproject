@extends('layout')

@section('title', 'Dashboard')

@section('content')
<a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3">
    <i class="bi bi-arrow-left"></i> Back
</a>

<div class="card shadow fade-in">
    <div class="card-body">
        <h2 class="mb-4">Hello, {{ auth()->user()->name }} 👋</h2>
        <form action="{{ route('meter-readings.store') }}" method="POST" class="p-4 bg-white rounded shadow">
    @csrf

    <div class="mb-3">
        <label>Hall Name</label>
        <input type="text" name="hall_name" class="form-control" placeholder="اسم الكوشة" required>
    </div>

    <div class="mb-3">
        <label>Client Name</label>
        <input type="text" name="client_name" class="form-control" placeholder="الاسم" required>
    </div>

    <div class="mb-3">
        <label>Previous Meter</label>
        <input type="number" name="previous_meter" class="form-control" placeholder="العداد السابق" required>
    </div>

    <div class="mb-3">
        <label>Current Meter</label>
        <input type="number" name="current_meter" class="form-control" placeholder="العداد الحالي" required>
    </div>

    <div class="mb-3">
        <label>Total</label>
        <input type="number" name="total" class="form-control" placeholder="المجموع" required>
    </div>

    <div class="mb-3">
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" placeholder="المبلغ" required>
    </div>

    <div class="mb-3">
        <label>Notes</label>
        <textarea name="notes" class="form-control" placeholder="ملاحظات"></textarea>
    </div>
    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">
        الحالة
    </label>
    <div class="flex items-center gap-4">
        <label class="inline-flex items-center">
            <input type="radio" name="status" value="واصل" class="form-radio text-indigo-600">
            <span class="ml-2">واصل</span>
        </label>
        <label class="inline-flex items-center">
            <input type="radio" name="status" value="غير واصل" class="form-radio text-red-600">
            <span class="ml-2">غير واصل</span>
        </label>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Save</button>
</form>


<a href="{{ route('meter-readings.table') }}" class="btn btn-success">
    عرض قائمة البيانات
</a>
<br>
</div>
<br>
<a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>


    </div>
</div>
@endsection
