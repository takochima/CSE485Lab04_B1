@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết bản ghi mượn</h1>
        <p><strong>Quyển sách:</strong> {{ $borrow->book->name }}</p>
        <p><strong>Người mượn:</strong> {{ $borrow->reader->name }}</p>
        <p><strong>Ngày mượn:</strong> {{ $borrow->borrow_date }}</p>
        <p><strong>Ngày trả:</strong> {{ $borrow->return_date }}</p>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection