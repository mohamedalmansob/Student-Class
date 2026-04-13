@extends('master')

@section('titel')
    بيانات الطلاب
@endsection
@section('content')
    <div class="col-12" style="background-color: white;padding: 15px">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="text-align: center;float: none;">بيانات الطلاب
         <a href="{{ route('Students.Create') }}" class="btn btn:sm btn-info">اضافة جديد</a>
          </h3>
          @if (Session::has('success'))
          <div class="alert alert-success" role="alert" id="success-alert">
              {{ Session::get('success') }}
          </div>
      @endif
      
      <script>
          // عند تحميل الصفحة
          window.onload = function() {
              let alertBox = document.getElementById('success-alert');
              if(alertBox){
                  // بعد 3 ثواني يختفي تدريجيًا
                  setTimeout(() => {
                      alertBox.style.transition = "opacity 1s ease";
                      alertBox.style.opacity = 0;
                      setTimeout(() => alertBox.remove(), 1000); // يحذف العنصر بعد الاختفاء
                  }, 3000); // 3000ms = 3 ثواني
              }
          }
      </script>
      
        @if (Session::has('error'))
        <div class="alert alert-error" role="alert">
            {{ Session::get('error') }}
          </div>
        @endif
    
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            @if (@isset($data) and !@empty($data) and @count($data)>0 )
                
           
            <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>اسم الطالب</th>
                <th> الدولة</th>
                <th>العنوان </th>
                <th> الهاتف</th>
               
                <th > الصورة</th>
                <th>ملاحظة</th>
                <th>حالة التفعيل</th>
                <th>تاريخ الاضافة</th>
                <th>تاريخ التحديث</th>
                <th>التحكم </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $info)
              <tr>
                <td>{{ $info->name }}</td>
                <td>{{ $info->country_name }}</td>
                <td>{{ $info->address }}</td>
                <td>{{ $info->phones }}</td>
                <td style="height: 80px"><img src="{{ asset('uploade/'.$info->image) }}" alt="" style="height: 100%;width: 100% "></td>
                <td>{{ $info->notes }}</td>
                
                <td>@if ( $info->active==1)مفعل @else معطل@endif</td>
                <td>{{ $info->created_at }}</td>
                <td>{{ $info->updated_at }}</td>
                <td style="display: flex; gap: 10px;">
                  <a href="{{ route('Students.edit',$info->id) }}" 
                     style="background-color: green; padding: 10px; color: white; text-decoration: none;">
                     تعديل
                  </a>
                  <a href="{{ route('Students.delete',$info->id) }}" 
                     style="background-color: rgb(212, 144, 179); padding: 10px; color: white; text-decoration: none;">
                     حذف
                  </a>
              </td>
              
              
              
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p style="text-align: center;color: brown;margin-top: 20px">لا توجد بيانات لعرضها</p>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
 
@endsection
