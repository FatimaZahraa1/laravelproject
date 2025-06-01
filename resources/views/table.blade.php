@extends('layout')

@section('content')
<a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3">
    <i class="bi bi-arrow-left"></i> Back
</a>
<form method="GET" action="{{ route('meter-readings.table') }}" class="mb-4 d-flex">
    <input 
        type="text" 
        name="search" 
        value="{{ request('search') }}" 
        class="form-control form-control-lg me-2" 
        placeholder="ابحث بالاسم، الكوشة، أو الحالة"
    >
    <button class="btn btn-success" type="submit">
        <i class="bi bi-search"></i>
    </button>
</form>


<div class="container mx-auto mt-8 px-4">
    <h1 class="text-xl font-bold mb-4 text-center">قائمة البيانات</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-3 py-2 border">اسم الكوشة</th>
                    <th class="px-3 py-2 border">الاسم</th>
                    <th class="px-3 py-2 border">العداد السابق</th>
                    <th class="px-3 py-2 border">العداد الحالي</th>
                    <th class="px-3 py-2 border">المجموع</th>
                    <th class="px-3 py-2 border">المبلغ</th>
                    <th class="px-3 py-2 border">ملاحظات</th>
                    <th class="px-3 py-2 border">الحالة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readings as $reading)
                    <tr class="text-center">
                        <td class="px-3 py-2 border">{{ $reading->hall_name }}</td>
                        <td class="px-3 py-2 border">{{ $reading->client_name }}</td>
                        <td class="px-3 py-2 border">{{ $reading->previous_meter }}</td>
                        <td class="px-3 py-2 border">{{ $reading->current_meter }}</td>
                        <td class="px-3 py-2 border">{{ $reading->total }}</td>
                        <td class="px-3 py-2 border">{{ $reading->amount }}</td>
                        <td class="px-3 py-2 border">{{ $reading->notes }}</td>
                        <td class="px-3 py-2 border">
                            {{ $reading->delivered ? 'واصل' : 'غير واصل' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
