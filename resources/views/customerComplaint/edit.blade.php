@extends('layouts.master')

@section('content')


<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">متابعة شكوى عميل</h3>
    <hr>
    <form action="{{route('customerComplaints.update',$customerComplaint->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2>متابعة شكوى عميل</h2>
            <hr class="w-100">
        </div>
        <div id="mainDiv"  style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <img src="{{ asset($customerComplaint->logo) }}" height=180px width=210px; />
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">مصدر الشكوي:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="source_complaint" value="{{$customerComplaint->source_complaint}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">نوع المنتج / الخدمه:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="type_product_service" value="{{$customerComplaint->type_product_service}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">اسم العميل:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="customer_name" value="{{$customerComplaint->customer_name}}">
            </div>
        </div>
        <div class="form-group row ">
            <label for="" class="col-3 col-form-label">المكان:</label>
            <div class="col-6">
                <input type="text" class="form-control" name="place" value="{{$customerComplaint->place}}">
            </div>
        </div>
        <div class="form-group row text-left">
            <label for="" class="col-3 col-form-label">التاريخ:</label>
            <div class="col-6">
                <input type="date" class="form-control" name="date_1" value="{{$customerComplaint->date_1}}">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 text-right" style="text-align:center;">
            <table class="table">
                <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                    <th>موضوع الشكوي</th>
                    <th>تاريخ استقبال الشكوي</th>
                    <th>تاريخ ارسالهاالي الادارات المختصه</th>
                    <th>تاريخ وصول الرد</th>
                    <th>تاريخ ارسال الرد الي العميل </th>
                    <th>ملاحظات  العميل </th>
                </tr>
                <tr>
                    <th><textarea class="form-control" type="text" name="subject_complaint">{{$customerComplaint->subject_complaint}}</textarea></th>
                    <th><input class="form-control" type="date" name="date_2" value="{{$customerComplaint->date_2}}"></th>
                    <th><input class="form-control" type="date" name="date_3" value="{{$customerComplaint->date_3}}"></th>
                    <th><input class="form-control" type="date" name="date_4" value="{{$customerComplaint->date_4}}"></th>
                    <th><input class="form-control" type="date" name="date_5" value="{{$customerComplaint->date_5}}"></th>
                    <th><textarea class="form-control" type="text" name="nodes">{{$customerComplaint->nodes}}</textarea></th>
                </tr>
            </table>
        </div>
        <hr class="w-100">
        <div style="" class="w-100 text-center my-4">
            <h2>ﺇدارة التسويق والمبيعات (إرضاء العميل)   :</h2>
        </div>
        <div class="form-group row ">
            <label for="" class="col-2 col-form-label">الأسم :</label>
            <div class="col-9">
                <input type="text" class="form-control" name="name" value="{{$customerComplaint->name}}">
            </div>
            <label for="" class="col-2 col-form-label">التاريخ :</label>
            <div class="col-9">
                <input type="date" class="form-control" name="date_6" value="{{$customerComplaint->date_6}}">
            </div>
        </div>
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :"  value="{{ $customerComplaint->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2"  value="{{ $customerComplaint->date2 }}" placeholder="تاريخ الإصدار   :" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3"  value="{{ $customerComplaint->date3 }}" placeholder="تاريخ التعديل :" onfocus="(this.type='date')" onblur="(this.type='text')">
                          </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                سنتان </label>
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                          1</label>
                      </div>
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                          - 13 </label>
                      </div>
                    </th>
                  </tr>
            </thead>
        </table>
        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
            class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
        </div>
    </form>
</div>

<style>
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid black;
}

table,
th,
td,
tr {
    border: 1px solid black;
    border-bottom: 2px solid black;
    border-top: 2px solid black;
}

#mainDiv {
    height: 150px;
    width: 50px;
    background: #ffffff;
    border: 1px solid rgb(8, 2, 2);
    text-align: center;
    float:left;
    display: inline-table;
}
</style>
@stop