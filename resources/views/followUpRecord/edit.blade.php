@extends('layouts.master')
@section('content')
<style>
    .shadow-lg {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }

    h2 {

        padding: 2px;
        text-align: right;
    }

</style>
<div class="card">
    <div class='card-body row' style='margin:auto; width:70%'>

        <form action="{{route('followUpRecord.update',$followUpRecord->id)}}" style='margin:auto; width:70%' method="post" enctype="multipart/form-data" id="fo1">
            @method('PUT')
            {{ csrf_field() }}
            <div style="" class="w-100 text-center my-4">
                <h2 style='text-shadow: 1px 1px 1px #3ed3ea;margin:auto'>سجل متابعة طلبات الإجراءات التصحيحية / الوقائية </h2>
                <label class='mt-2'>لــعام</label>
                <input style="text-align: center;" type="text" name="year" value="{{$followUpRecord->year}}">
                <hr class="w-100">
            </div>
            <div id="mainDiv" style=" margin-right:500px;">
                <h4 style=" color:blue;">CO LOGO</h4>
                <hr width="50%" size="20" color="blue">
                <img src="{{ asset($followUpRecord->logo) }}" height=180px width=210px; />
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            <hr class="w-100">
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <table class="table">
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th class="col-1 col-form-label" scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">رقم الطلب</th>
                        <th scope="col" rowspan="2">تاريخ</th>
                        <th scope="col" rowspan="2">الإدارة المختصة</th>
                        <th scope="col" rowspan="2">الموضوع</th>
                        <th scope="col" colspan="6">المصدر * </th>
                        <th scope="col" rowspan="2">نتائج المتابعة</th>
                        <th scope="col" colspan="3">فاعلية الإجراء **</th>
                    </tr>
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col"> 1</th>
                        <th scope="col">2</th>
                        <th scope="col"> 3</th>
                        <th scope="col">4</th>
                        <th scope="col"> 5</th>
                        <th scope="col">6</th>
                        <th scope="col"> 7</th>
                        <th scope="col">8</th>
                        <th scope="col"> 9</th>
                    </tr>
                    @if(count($followUpRecord->followUpRecord)>0)
                    @foreach($followUpRecord->followUpRecord as $key => $data)
                    <tr id="followUpRecord-{{$key}}">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][number]" value="{{$data->number}}"></th>
                        <th><input class="form-control" type="date" name="followUpRecord[{{$key}}][date_1]" value="{{$data->date_1}}"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][management]" value="{{$data->management}}"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][subject]" value="{{$data->subject}}"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][one]" value="1" {{ $followUpRecord->followUpRecord[$key]->one=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][two]" value="1" {{ $followUpRecord->followUpRecord[$key]->two=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][three]" value="1" {{ $followUpRecord->followUpRecord[$key]->three=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][four]" value="1" {{ $followUpRecord->followUpRecord[$key]->four=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][five]" value="1" {{ $followUpRecord->followUpRecord[$key]->five=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][six]" value="1" {{ $followUpRecord->followUpRecord[$key]->six=="1"? 'checked':'' }}></th>
                        <th><input class="form-control" type="text" name="followUpRecord[{{$key}}][result]" value="{{$data->result}}"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][seven]" value="1" {{ $followUpRecord->followUpRecord[$key]->seven=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][eight]" value="1" {{ $followUpRecord->followUpRecord[$key]->eight=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[{{$key}}][nine]" value="1" {{ $followUpRecord->followUpRecord[$key]->nine=="1"? 'checked':'' }}></th>
                    </tr>
                    @endforeach
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($followUpRecord->followUpRecord)-1}}" onclick="appendRow({{count($followUpRecord->followUpRecord)-1}})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @else
                    <tr id="followUpRecord-0">
                        <th class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][number]"></th>
                        <th><input class="form-control" type="date" name="followUpRecord[0][date_1]"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][management]"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][subject]"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][one]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][two]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][three]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][four]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][five]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][six]" value="1"></th>
                        <th><input class="form-control" type="text" name="followUpRecord[0][result]"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][seven]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][eight]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; " type="checkbox" name="followUpRecord[0][nine]" value="1"></th>
                    </tr>
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>



            <table class="table">
                <thead>
                    <tr>
                        <th class=" w-50 text-center col-3 " style="border: 2px solid #150c0c !important;">
                            <div class="form-group row w-20 text-left">
                                <label for="" class="col-3 col-form-label">* المصدر </label>
                                <label for="" class="col-3 col-form-label">(1) مراجعة داخلية</label>
                                <label for="" class="col-3 col-form-label">(2) مراجعة خارجية </label>
                                <label for="" class="col-3 col-form-label">(3) مراجعة إدارة</label>
                            </div>

                            <div class="form-group row w-20 text-left">
                                <label for="" class="col-2 col-form-label"></label>
                                <label for="" class="col-3 col-form-label">(4) شكوى العميل</label>
                                <label for="" class="col-3 col-form-label">(5) حالة عدم مطابقة </label>
                                <label for="" class="col-3 col-form-label">(6) أخرى(تذكر الحالة)</label>
                            </div>
                        </th>
                        <th class=" w-30 text-center col-2 " style="border: 2px solid #0f0a0a !important;">
                            <div class="form-group row w-10 text-left">
                                <label for="" class="col-4 col-form-label"> ** فاعلية الإٌجراء </label>
                            </div>

                            <div class="form-group row w-30 text-center">
                                <label for="" class="col-4 col-form-label">(7) إقفال الطلب </label>
                                <label for="" class="col-4 col-form-label">(8) إجراء تصحيحي أخر </label>
                                <label for="" class="col-4 col-form-label">(9)أجراء وقائي أخر</label>
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :" value="{{ $followUpRecord->company_name }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :" value="{{ $followUpRecord->date2 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" value="{{ $followUpRecord->date3 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> مدة الحفظ </label>
                                <input class="form-control shadow-lg" type="text" name="period_time" value="{{ $followUpRecord->period_time }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الصفحة </label>
                                <input class="form-control shadow-lg" type="text" name="number_page" value="{{ $followUpRecord->number_page }}">
                            </div>

                        </th>
                        <th>
                            <div class="" style="text-align:start ;">
                                <label> رقم الوثيقة </label>
                                <input class="form-control shadow-lg" type="text" name="number_doc" value="{{ $followUpRecord->number_doc }}">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>

    </div>
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل </button>
    </div>
    </form>
</div>



<script>
    function appendRow(num) {
        $new_number = parseInt(num) + 1;
        $appended_text = ` <tr class="datatable-row datatable-row-even" id="followUpRecord-${$new_number}">
                                             
                                              <td class="text-center end-td ">
                                                        <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                  class="btn btn-danger btn-option">
                                                                  <i class="fa fa-minus-circle"></i>
                                                        </button>
                                              </td>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][number]"></th>
                    <th><input class="form-control" type="date" name="followUpRecord[${$new_number}][date_1]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][management]"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][subject]"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][one]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][two]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][three]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][four]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][five]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][six]"value="1"></th>
                    <th><input class="form-control" type="text" name="followUpRecord[${$new_number}][result]"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"  name="followUpRecord[${$new_number}][seven]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"   name="followUpRecord[${$new_number}][eight]"value="1"></th>
                    <th><input style="width: 40px; height: 40px; " type="checkbox"  name="followUpRecord[${$new_number}][nine]"value="1"></th>
                                    </tr>`;
        $($appended_text).insertAfter(`#followUpRecord-${num}`);
        if (!document.getElementById(`followUpRecord-${num}`)) {
            $($appended_text).insertAfter(`#followUpRecord-0`);
        }

        $(`#btn-${num}`).remove();
        $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);



    }

    function removeRow(num, id) {
        if (id != 0) {
            $("#followUpRecord-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
        }
        $(`#followUpRecord-${num}`).remove();

    }

</script>

<style>
    <style>.table thead th {
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
        float: left;
        display: inline-table;
    }

</style>
@stop
