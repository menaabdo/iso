@extends('layouts.master')

@section('content')


<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    input,
    textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

</style>
<div class="card">
    <div class="card-body row" style='margin:auto;margin-top:80px'>

       
       
        <form action="{{route('dataCollectionReports.store')}}" class='col-md-9
        ' style='margin:auto' method="post" enctype="multipart/form-data" id="fo1">
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;'> تقرير جمع و تحليل البيانات</h2>
                <hr class="w-100">
            </div>
            <div class='row mt-4 mb-3'>
                <label class="form-label col-md-3 ">CO LOGO</label>
                <div class="col-6">
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">التاريخ:</label>
                <div class="col-6">
                    <input type="date" class="form-control" name="date_1">
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">القسم:</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="department">
                </div>
            </div>
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">البيانات المطلوبة :</label>
                <div class="col-6">
                    <textarea type="text" class="form-control" name="date_details"></textarea>
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">التفاصيل :</label>
                <div class="col-6">
                    <textarea type="text" class="form-control" name="details"></textarea>
                </div>
            </div>
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">النتائج :</label>
                <div class="col-6">
                    <textarea type="text" class="form-control" name="result"></textarea>
                </div>
            </div>
            @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))
            <hr class="w-100">
            <div class="form-group row ">
                <label for="" class="col-3 col-form-label">مدير الجودة :</label>
                <div class="col-6">
                    <input type="text" class="form-control" name="name_1">
                </div>
            </div>
            @endif
            <hr class="w-100">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label> اسم الشركة </label>
                                <input class="form-control" type="text" name="company_name" >
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label>تاريخ الاصدار </label>
                                <input class="form-control" type="text" name="date2"  onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                            <label> تاريخ التعديل </label>
                                <input class="form-control" type="text" name="date3"  onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class='row'>
            <button style="border-radius:8px;margin: 50px; width:30% ;background-color: #2a415b; ;height: 5%;padding:10px;margin-right:100px;margin:auto" type="submit"
                class="btn btn-primary col-md-4">
                <i class="fas fa-save" style="width:15% ; height: 20%;"></i>حفظ</button>
                    </div>  
        </form>
    </div>

    <style>
        .table thead th {
            vertical-align: bottom;
          
        }

        table,
        th,
        td,
        tr {
            border: 1px solid silver;
           
        }

        #mainDiv {
            height: 150px;
            width: 50px;
            background: #ffffff;
            border: 1px solid rgb(8, 2, 2);
            text-align: center;
            float: left;
            display: inline-table;
        }

    </style>
    @stop
