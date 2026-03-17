@extends('master')

@section('titel')
    الكورسات
@endsection
@section('content')
    <div class="col-12" style="background-color: white;padding: 15px">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="text-align: center;float: none;">بيانات الكورسات</h3>

    
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            @if (@isset($data) and !@empty($data) and @count($data)>0 )
                
           
            <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>اسم الكورس</th>
                <th>حالة التفعيل</th>
                <th>تاريخ الاضافة</th>
                <th>تاريخ التحديث</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $info)
              <tr>
                <td>{{ $info->name }}</td>
                <td>@if ( $info->active==1)مفعل @else معطل@endif</td>
                <td>{{ $info->created_at }}</td>
                <td>{{ $info->updated_at }}</td>
                <td>
                    <a href="{{ route('Corses.edit',$info->id) }}" class="button" style="background-color: green;padding: 10px;color: white">تعديل</a>
                    <a href="{{ route('Corses.store',$info->id) }}" class="button" style="background-color: rgb(212, 144, 179);padding: 10px;color: white">حذف</a>

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
