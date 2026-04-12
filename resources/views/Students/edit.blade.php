@extends('master')
@section('titel')
    تعديل طالب جديد
@endsection
@section('content')
<div class="col-md-12">
  {{-- عرض الرسالة --}}
  @if (Session::has('error'))
  <div class="alert alert-error" role="alert">
      {{ Session::get('error') }}
    </div>
  @endif
<form method="POST" action="{{ route('Students.update',$data['id']) }}" role="form" style="width: 80%;margin: 0 auto;background-color: white">
  @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">اسم الطالب</label>
        <input autofocus type="text" name="name" class="form-control" id="name" placeholder="Enter email" value="{{ old('name',$data['name']) }}">
        @error('name')
           <span style="color: red">{{ $message }}</span> 
        @enderror
      </div>

      <div class="form-group">
        <label for=""> الدولة التي ينتمي لها الطالب
        </label>
         <select  id="country_id" name="country_id" class="form-control">
          <option value="">اختر الدولة</option>
          @if (!@empty($countrise))
          @foreach ($countrise as $info)
          <option value="{{ $info->id }}" @if (old('country_id',$data['country_id']==$info->id)) selected @endif>{{ $info->name }}</option>
              
          @endforeach
              
          @endif
         </select>
         @error('country_id')
         <span style="color: red">{{ $message }}</span> 
      @enderror
      </div>

      <div class="form-group">
        <label for="nutionalID"> الرقم القومي</label>
        <input autofocus type="text" name="nutionalID" class="form-control" id="nutionalID"  value="{{ old('nutionalID',$data['nutionalID']) }}">
        @error('nutionalID')
        <span style="color: red">{{ $message }}</span> 
     @enderror
      </div>
      <div class="form-group">
        <label for="phones"> الهاتف</label>
        <input autofocus type="text" name="phones" class="form-control" id="phones"  value="{{ old('phones',$data['phones']) }}">
        @error('phones')
        <span style="color: red">{{ $message }}</span> 
     @enderror
      </div>
      <div class="form-group">
        <label for="address"> العنوان</label>
        <input autofocus type="text" name="address" class="form-control" id="address"  value="{{ old('address',$data['address']) }}">
        
      </div>

      <div class="form-group">
        <label for="notes"> ملاحظات</label>
        <input autofocus type="text" name="notes" class="form-control" id="notes"  value="{{ old('notes',$data['notes']) }}">
        
      </div>

      <div class="form-group">
        <label for="photo"> تغيير صورة الطالب</label>
        {{-- <img src="{{ asset('uploade/'.$data['image']) }}" alt="" style="width: 90px;height: 90px;"> --}}
        <input autofocus type="file" name="photo" class="form-control" id="photo"  value="{{ old('photo') }}" >
        
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
      <button type="submit" class="btn btn-primary">تعديل طالب</button>
    </div>
  </div>
  </form>
</div>
@endsection
