@extends('master')
@section('titel')
    تعديل كورس جديد
@endsection
@section('content')
<div class="col-md-12">
  {{-- عرض الرسالة --}}
  @if (Session::has('error'))
  <div class="alert alert-error" role="alert">
      {{ Session::get('error') }}
    </div>
  @endif
<form method="POST" action="{{ route('Corses.update',$data['id']) }}" role="form" style="width: 80%;margin: 0 auto;background-color: white">
  @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">اسم الكورس</label>
        <input autofocus type="text" name="name" class="form-control" id="name" placeholder="Enter email" value="{{ old('name',$data['name']) }}">
        @error('name')
           <span style="color: red">{{ $message }}</span> 
        @enderror
      </div>
      <div class="form-group">
        <label for="">حالة التفعيل</label>
         <select name="active" id="active" name="active" class="form-control">
          <option value="">اختر الحالة</option>
          <option value="1" @if (old('active',$data['active'])==1) selected @endif>مفعلة</option>
          <option value="0"@if (old('active',$data['active'])==0) selected @endif>معطلة</option>
         </select>
         @error('active')
         <span style="color: red">{{ $message }}</span> 
      @enderror
      </div>
     
     
    
    <!-- /.card-body -->

    <div style="text-align: center" class="form-group">
      <button type="submit" class="btn btn-primary">تحديث كورس</button>
    </div>
  </div>
  </form>
</div>
@endsection
