@extends('layouts.master')
@section('content')

<div class="card">
<div class="card-body">
  <h3 style="margin-top:85px;">تقرير حالات عدم المطابقة والإجراءات التصحيحية والوقائية
  </h3>
  <hr>
    <form action="{{route('reportNonConformanceCases.update',$reportNonConformanceCases->id)}}" method="post" enctype="multipart/form-data" id="fo1">
        @method('PUT') 
              {{ csrf_field() }}
            <div  class="w-100 text-center my-4">
                <h2>تقرير حالات عدم المطابقة والإجراءات التصحيحية والوقائية</h2>
                <hr class="w-100">
            </div>
            <div class=" form-group row  text-left">
                <label for="" class="col-1 col-form-label text-left">الفترة من  يوم :</label>
                <div class="col-1">
                  <input type="text" class="form-control"  name="day_from" value="{{$reportNonConformanceCases->day_from}}">
                </div>
                <label for="" class="col-1 col-form-label text-left" >تاريخ  :</label>
                <div class="col-2">
                  <input type="date" class="form-control"  name="date_1" value="{{$reportNonConformanceCases->date_1}}">
                </div>

                <label for="" class="col-1 col-form-label text-left" >إلى يوم :</label>
                <div class="col-1">
                  <input type="text" class="form-control"  name="day_to" value="{{$reportNonConformanceCases->day_to}}">
                </div>
                <label for="" class="col-1 col-form-label text-left">تاريخ  :</label>
                <div class="col-2">
                  <input type="date" class="form-control"  name="date_2" value="{{$reportNonConformanceCases->date_2}}">
                </div>
             
            </div>
              <div id="mainDiv"  style="margin-right:1100px">
                <h4 style=" color:blue;">CO LOGO</h4>
                <hr width="50%" size="20" color="blue">
                <img src="{{ asset($reportNonConformanceCases->logo) }}" height=180px width=210px; />
                <input type="file" id="img" name="logo" accept="image/*">
            </div>
            
            
            <div class="form-group row w-100 text-right" style="text-align:center;">
                <hr class="w-100">
                <table class="table">
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th class="col-1 col-form-label" scope="col" rowspan="2">م</th>
                        <th scope="col" rowspan="2">حالة عدم المطابقة</th>
                        <th scope="col" rowspan="2">الإدارة  المختصة</th>
                        <th scope="col" rowspan="2">تاريخ إكتشفاها</th>
                        <th scope="col" rowspan="2">الأسباب</th>
                        <th scope="col" colspan="2">الإجراء المتخذ </th>
                        <th scope="col" colspan="2">فاعلية التنفيذ</th>
                        <th scope="col" rowspan="2">ملاحظات</th>
                    </tr>
                    <tr style="background-color:rgb(249, 235, 141); text-align:center;">
                        <th scope="col"> تصحيحى </th>
                        <th scope="col">وقائي</th>
                        <th scope="col"> تم </th>
                        <th scope="col">لم يتم</th>
                        
                    </tr>

                    @if(count($reportNonConformanceCases->reportNonConformanceCases)>0)
                    @foreach($reportNonConformanceCases->reportNonConformanceCases as $key => $data)
                    <tr id="reportNonConformanceCases-{{$key}}">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" onclick="removeRow({{$key}},{{$data->id}})" @if ($key==0) disabled="disabled" @endif class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[{{$key}}][case_non_conformance]"  value="{{$data->case_non_conformance}}"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[{{$key}}][management]"  value="{{$data->management}}"></th>
                        <th><input class="form-control" type="date" name="reportNonConformanceCases[{{$key}}][date_3]"  value="{{$data->date_3}}"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[{{$key}}][reason]"  value="{{$data->reason}}"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][corrective]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->corrective=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][preventive]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->preventive=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][completed]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->completed=="1"? 'checked':'' }}></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[{{$key}}][non_completed]" value="1" {{ $reportNonConformanceCases->reportNonConformanceCases[$key]->non_completed=="1"? 'checked':'' }}></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[{{$key}}][notes]" value="{{$data->notes}}"></th>
                        
                    </tr>
                    @endforeach
                    <tr class="datatable-row datatable-row-even">
                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-{{count($reportNonConformanceCases->reportNonConformanceCases)-1}}" onclick="appendRow({{count($reportNonConformanceCases->reportNonConformanceCases)-1}})"><i class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @else

                    <tr id="reportNonConformanceCases-0">
                        <th class="text-center end-td " >
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                              <i class="fa fa-minus-circle"></i>
                            </button>
                        </th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[0][case_non_conformance]"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[0][management]"></th>
                        <th><input class="form-control" type="date" name="reportNonConformanceCases[0][date_3]"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[0][reason]"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[0][corrective]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[0][preventive]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[0][completed]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[0][non_completed]" value="1"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[0][notes]"></th>
                        
                    </tr>
                    <tr class="datatable-row datatable-row-even" >
                        <td class="text-center end-td " id="increment">
                          <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                              class="fa fa-plus-circle"></i></button>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
          
        
        <hr class="w-100">
        <table class="table">
            <thead>
                <tr>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="company_name" placeholder="اسم الشركة  :" value="{{ $reportNonConformanceCases->company_name }}">
                      </div>
            
                    </th>
                    <th>
                      <div class="" style="text-align:start ;">
                        <input class="form-control" type="text" name="date2" placeholder="تاريخ الإصدار   :"value="{{ $reportNonConformanceCases->date2 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
                      </div>
            
                    </th>
                    <th>
                        <div class="" style="text-align:start ;">
                            <input class="form-control" type="text" name="date3" placeholder="تاريخ التعديل :" value="{{ $reportNonConformanceCases->date3 }}" onfocus="(this.type='date')" onblur="(this.type='text')">
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
    
    </div>
    <div class="form-group">
        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
          class="btn btn-primary btn-lg"><i class="fas fa-save" style="width:15% ; height: 20%;"></i> تعديل  </button>
      </div>
    </form>
    </div>
<script>
    function appendRow(num) {
                      $new_number = parseInt(num) + 1;
                      $appended_text = ` <tr class="datatable-row datatable-row-even" id="reportNonConformanceCases-${$new_number}">
                                         
                                          <td class="text-center end-td ">
                                                    <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                              class="btn btn-danger btn-option">
                                                              <i class="fa fa-minus-circle"></i>
                                                    </button>
                                          </td>
                                          <th><input class="form-control" type="text" name="reportNonConformanceCases[${$new_number}][case_non_conformance]"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[${$new_number}][management]"></th>
                        <th><input class="form-control" type="date" name="reportNonConformanceCases[${$new_number}][date_3]"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[${$new_number}][reason]"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[${$new_number}][corrective]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[${$new_number}][preventive]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[${$new_number}][completed]" value="1"></th>
                        <th><input style="width: 40px; height: 40px; "  type="checkbox"  name="reportNonConformanceCases[${$new_number}][non_completed]" value="1"></th>
                        <th><input class="form-control" type="text" name="reportNonConformanceCases[${$new_number}][notes]"></th>
                                </tr>`;
                                $($appended_text).insertAfter(`#reportNonConformanceCases-${num}`);
                      if (!document.getElementById(`reportNonConformanceCases-${num}`)) {
                                $($appended_text).insertAfter(`#reportNonConformanceCases-0`);
                      }
  
                      $(`#btn-${num}`).remove();
                      $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);
  
  
      
                }
      
                function removeRow(num, id) {
        if (id != 0) {
            $("#reportNonConformanceCases-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
        }
        $(`#reportNonConformanceCases-${num}`).remove();

    }
  </script>

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