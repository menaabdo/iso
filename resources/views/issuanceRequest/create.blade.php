@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-body">
    <h3 style="margin-top:85px;">طلب إصدار / تعديل / إلغاء وثيقة</h3>
    <hr>
    <form action="{{route('issuanceRequest.store')}}" method="post" enctype="multipart/form-data" id="fo1">
        {{ csrf_field() }}
        <div style="" class="w-100 text-center my-4">
            <h2>طلب إصدار / تعديل / إلغاء وثيقة</h2>
            <hr class="w-100">
        </div>
        <div id="mainDiv" style=" margin-right:500px;">
            <h4 style=" color:blue;">CO LOGO</h4>
            <hr width="50%" size="20" color="blue">
            <input type="file" id="img" name="logo" accept="image/*">
        </div>
        <div class="form-group text-left">
            <label for="" class="col-1 col-form-label">1- الإدارة :</label>
            <div class="col-4">
                <input type="text" class="form-control" name="management">
            </div>
            <div class="vertical"></div>
            <label for="" class="col-2 col-form-label">التاريخ :</label>
            <div class="col-4">
                <input type="date" class="form-control" name="date_1">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group  text-left">
            <label for="" class="col-2 col-form-label">2- نوع وإسم الوثيقة</label>
            <div class="col-12">
                <textarea type="text" class="form-control" placeholder="  ......" name="document_type_and_name"></textarea>
            </div>
        </div>
        <div class="form-group row w-100 text-left">
            <label for="" class="col-1 col-form-label">3- رمز الوثيقة :</label>
            <div class="col-3">
                <input type="text" class="form-control" name="document_code">
            </div>
            <label for="" class="col-1 col-form-label text-left">رقم الإصدار</label>
            <div class="col-3">
                <input type="text" class="form-control" name="issue_number">
            </div>
            <label for="" class="col-1 col-form-label text-left">تاريخ الإصدار :</label>
            <div class="col-3">
                <input type="date" class="form-control" name="release_date">
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-100 ">
            <h2 for="" class="col-2 col-form-label">4- ملخص المطلوب وسببه :</h2>
            <div class="col-4 col-form-label">
                <input type="radio" name="summary" value="issuance">
                <label for="" class="col-2 col-form-label text-left">إصدار </label>
            </div>
            <div class="col-4 col-form-label">
                <input type="radio" name="summary" value="update">
                <label for="" class="col-2 col-form-label text-left">تعديل </label>
            </div>
            <div class="col-3 col-form-label">
                <input type="radio" name="summary" value="cancel">
                <label for="" class="col-2 col-form-label text-left">إلغاء </label>
            </div>
            <div class="col-12">
                <textarea type="text" class="form-control" placeholder="  ......" name="reason"></textarea>
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group row w-200 text-left">
            <h2 for="" class="col-2 col-form-label">5- التعديلات المقترحة </h2>
            <div class="col-12">
                <textarea type="text" class="form-control" placeholder="  ......" name="suggested_modifications"></textarea>
            </div>
        </div>
        <hr class="w-100">
        <div class="form-group text-left">
            <h2 for="" class="col-2 col-form-label">مقدم الطلب :</h2>
        </div>
        <div class="form-group row w-10 text-center">
            <label for="" class="col-1 col-form-label">الإسم </label>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="  ......" name="applicant">
            </div>
        </div>
        @if (Auth::user()->hasRole('Admin'))
        <hr class="w-100">

        <div class="form-group text-left">
            <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
            <div class="col-12">
                <textarea type="text" class="form-control" name="quality_manager"></textarea>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="  text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">
                                الاسم :</label>

                            <input class="form-control" type="text" name="quality_manager_name" style="text-align: end;" placeholder="">
                        </div>

                    </th>
                    <th class=" text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">
                                الوظيفة :</label>

                            <input class="form-control" type="text" name="quality_manager_job" style="text-align: end;" placeholder="">
                        </div>

                    </th>
                    <th class=" text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;">التاريخ :</label>

                            <input class="form-control" type="date" name="quality_manager_date" style="text-align: end;">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        @endif
        @if (Auth::user()->hasRole('SuperAdmin'))
        <div class="form-group text-left">
            <h1 for="" class="col-2 col-form-label">6- رأى مدير الجودة :</h1>
            <div class="col-12">
                <textarea type="text" class="form-control" name="quality_manager"></textarea>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="  text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">
                                الاسم :</label>

                            <input class="form-control" type="text" name="quality_manager_name" style="text-align: end;" placeholder="">
                        </div>

                    </th>
                    <th class=" text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">
                                الوظيفة :</label>

                            <input class="form-control" type="text" name="quality_manager_job" style="text-align: end;" placeholder="">
                        </div>

                    </th>
                    <th class=" text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;">التاريخ :</label>

                            <input class="form-control" type="date" name="quality_manager_date" style="text-align: end;">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <hr class="w-100">
        <div class="form-group row w-100 text-center">
            <h1 for="" class="col-9 col-form-label">* في حالة وجود أكثر من إدارة ترفق موافقاتهم وتوقيعهم في جدول يبين
                الإدارة ورأيها وتوقيع المسئول</h1>
        </div>
        <div class="form-group row w-100 text-left">
            <label for="" class="col-2 col-form-label">- قرار معتمد الوثيقة </label>
            <div class="col-12">
                <textarea type="text" class="form-control" placeholder="  ......" name="document_approved_decision"></textarea>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="  text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">
                                الاسم :</label>

                            <input class="form-control" type="text" name="document_approved_name" style="text-align: end;" placeholder="">
                        </div>

                    </th>
                    <th class=" text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">
                                الوظيفة :</label>

                            <input class="form-control" type="text" name="document_approved_job" style="text-align: end;" placeholder="">
                        </div>

                    </th>
                    <th class=" text-center col-4 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;">التاريخ :</label>

                            <input class="form-control" type="date" name="document_approved_date" style="text-align: end;">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        @endif
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :"
                                onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :"
                                onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> مدة
                                الحفظ :
                                سنتان </label>
                        </div>

                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                الصفحة : 1 /
                                1</label>
                        </div>
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;"> رقم
                                الوثيقة : QA – F
                                - 13 </label>
                        </div>
                    </th>
                </tr>
            </thead>
        </table>

        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> حفظ
            </button>
        </div>
    </form>
</div>

<style>
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