@extends('layouts.master')

@section('content')




    <div class="card">
        <div class="card-body">
            <h3 style="margin-top:85px;">سجل حصر الاجراءات المستخدمة</h3>
            <hr>
            <form action="{{ route('recordAction.update', $recordAction->id) }}" method="post" enctype="multipart/form-data"
                id="fo1">
                @method('PUT')
                {{ csrf_field() }}
                <div style="" class="w-100 text-center my-4">
                    <h2>سجل حصر الاجراءات المستخدمة</h2>
                    <hr class="w-100">
                </div>
                <div>
                    <label class="col-1">إدارة</label>
                    <input class="col-3" style="text-align: center;" type="text" name="management"
                        value="{{ $recordAction->management }}">
                </div>
                <div id="mainDiv" style=" margin-right:500px;">
                    <h4 style=" color:blue;">CO LOGO</h4>
                    <hr width="50%" size="20" color="blue">
                    <img src="{{ asset($recordAction->logo) }}" height=180px width=210px; />
                    @if ($recordAction->status == 'pending' && Auth::user()->hasRole('Employee'))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif

                    @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                        ($recordAction->status == 'pending' && Auth::user()->hasRole('Admin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                    @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($recordAction->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                        ($recordAction->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                        <input type="file" id="img" name="logo" accept="image/*">
                    @endif
                </div>

                <div class="form-group row w-100 text-right" style="text-align:center;">
                    <table class="table">
                        <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                            @if ($recordAction->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <th scope="col" rowspan="2">م</th>
                            @endif
                            @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($recordAction->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <th scope="col" rowspan="2">م</th>
                            @endif
                            @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($recordAction->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($recordAction->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <th scope="col" rowspan="2">م</th>
                            @endif
                            <th scope="col" rowspan="2">إسم الاجراء</th>
                            <th scope="col" rowspan="2">كود الاجراء</th>
                            <th scope="col" colspan="2">أخر إصدار/ تعديل</th>
                            <th scope="col" rowspan="2">مدة الحفظ</th>
                            <th scope="col" rowspan="2">ملاحظات</th>

                        </tr>
                        <tr style="background-color:rgb(235, 252, 160); text-align:center;">
                            <th scope="col">رقم</th>
                            <th scope="col"> التاريخ</th>
                        </tr>
                        @if (count($recordAction->recordAction) > 0)
                            @foreach ($recordAction->recordAction as $key => $intr)
                                <tr id="recordAction-{{ $key }}">
                                    @if ($recordAction->status == 'pending' && Auth::user()->hasRole('Employee'))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                        ($recordAction->status == 'pending' && Auth::user()->hasRole('Admin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($recordAction->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                        ($recordAction->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                        <td class="text-center end-td ">
                                            <button type="button" title="Remove"
                                                onclick="removeRow({{ $key }},{{ $intr->id }})"
                                                @if ($key == 0) disabled="disabled" @endif
                                                class="btn btn-danger btn-option">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    @endif
                                    <th><input class="form-control" type="text"
                                            name="recordAction[{{ $key }}][name_action]"
                                            value="{{ $intr->name_action }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="recordAction[{{ $key }}][code_action]"
                                            value="{{ $intr->code_action }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="recordAction[{{ $key }}][number]" value="{{ $intr->number }}">
                                    </th>
                                    <th><input class="form-control" type="date"
                                            name="recordAction[{{ $key }}][date_action]"
                                            value="{{ $intr->date_action }}"></th>
                                    <th><input class="form-control" type="text"
                                            name="recordAction[{{ $key }}][period_action]"
                                            value="{{ $intr->period_action }}"></th>
                                    <th>
                                        <textarea class="form-control" type="text" name="recordAction[{{ $key }}][notes_action]">{{ $intr->notes_action }}</textarea>
                                    </th>
                                </tr>
                            @endforeach
                            @if ($recordAction->status == 'pending' && Auth::user()->hasRole('Employee'))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($recordAction->recordAction) - 1 }}"
                                            onclick="appendRow({{ count($recordAction->recordAction) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                                ($recordAction->status == 'pending' && Auth::user()->hasRole('Admin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($recordAction->recordAction) - 1 }}"
                                            onclick="appendRow({{ count($recordAction->recordAction) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                            @if (($recordAction->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($recordAction->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                                ($recordAction->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                                <tr class="datatable-row datatable-row-even">
                                    <td class="text-center end-td " id="increment">
                                        <button type="button" class="btn btn-primary add_new"
                                            id="btn-{{ count($recordAction->recordAction) - 1 }}"
                                            onclick="appendRow({{ count($recordAction->recordAction) - 1 }})"><i
                                                class="fa fa-plus-circle"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr id="recordAction-0">
                                <th class="text-center end-td ">
                                    <button type="button" title="Remove" disabled="disabled"
                                        class="btn btn-danger btn-option">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </th>
                                <th><input class="form-control" type="text" name="recordAction[0][name_action]"></th>
                                <th><input class="form-control" type="text" name="recordAction[0][code_action]"></th>
                                <th><input class="form-control" type="text" name="recordAction[0][number]"></th>
                                <th><input class="form-control" type="date" name="recordAction[0][date_action]"></th>
                                <th><input class="form-control" type="text" name="recordAction[0][period_action]">
                                </th>
                                <th>
                                    <textarea class="form-control" type="text" name="recordAction[0][notes_action]"></textarea>
                                </th>
                            </tr>
                            <tr class="datatable-row datatable-row-even">
                                <td class="text-center end-td " id="increment">
                                    <button type="button" class="btn btn-primary add_new" id="btn-0"
                                        onclick="appendRow(0)"><i class="fa fa-plus-circle"></i></button>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            @if ($recordAction->status == 'inProgress' && Auth::user()->hasRole('Employee'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="name_1" value="{{ $recordAction->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="job_1" value="{{ $recordAction->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                            @endif
                            @if ($recordAction->status == 'confirmed' && Auth::user()->hasRole('Employee'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="name_1" value="{{ $recordAction->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="job_1" value="{{ $recordAction->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                                <th class="  text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="name_2" value="{{ $recordAction->name_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" readonly placeholder="  ......"
                                                name="job_2" value="{{ $recordAction->job_2 }}">
                                        </div>
                                    </div>

                                </th>
                            @endif
                            @if (Auth::user()->hasRole('Admin'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $recordAction->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_1" value="{{ $recordAction->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                                @if ($recordAction->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                                    <th class="  text-center col-2 ">
                                        <div class="" style="text-align:center ;">
                                            <label for="" class=""
                                                style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الاسم: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="name_2"
                                                    value="{{ $recordAction->name_2 }}">
                                            </div>
                                        </div>
                                        <div class="form-group row w-10 text-right">
                                            <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                            <div class="col-6">
                                                <input type="text" class="form-control" readonly
                                                    placeholder="  ......" name="job_2"
                                                    value="{{ $recordAction->job_2 }}">
                                            </div>
                                        </div>

                                    </th>
                                @endif
                            @endif
                            @if (Auth::user()->hasRole('SuperAdmin'))
                                <th class=" text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعداد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_1" value="{{ $recordAction->name_1 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_1" value="{{ $recordAction->job_1 }}">
                                        </div>
                                    </div>

                                </th>
                                <th class="  text-center col-2 ">
                                    <div class="" style="text-align:center ;">
                                        <label for="" class=""
                                            style="text-align:center;font-size:large;font-weight: bolder;">إعتماد:</label>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الاسم: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="name_2" value="{{ $recordAction->name_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row w-10 text-right">
                                        <label for="" class="col-3 col-form-label">الوظيفة: -</label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" placeholder="  ......"
                                                name="job_2" value="{{ $recordAction->job_2 }}">
                                        </div>
                                    </div>

                                </th>
                            @endif

                        </tr>
                    </thead>
                </table>


                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="company_name"
                                        placeholder="اسم الشركة  :" value="{{ $recordAction->company_name }}">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date2"
                                        value="{{ $recordAction->date2 }}" placeholder="تاريخ الإصدار   :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <input class="form-control" type="text" name="date3"
                                        value="{{ $recordAction->date3 }}" placeholder="تاريخ التعديل :"
                                        onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> مدة الحفظ :
                                        سنتان </label>
                                </div>

                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الصفحة : 1 /
                                        1</label>
                                </div>
                            </th>
                            <th>
                                <div class="" style="text-align:start ;">
                                    <label for="" class=""
                                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA –
                                        F
                                        - 13 </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>

                @if ($recordAction->status == 'pending' && Auth::user()->hasRole('Employee'))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($recordAction->status == 'inProgress' && Auth::user()->hasRole('Admin')) ||
                    ($recordAction->status == 'pending' && Auth::user()->hasRole('Admin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @elseif(($recordAction->status == 'inProgress' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($recordAction->status == 'pending' && Auth::user()->hasRole('SuperAdmin')) ||
                    ($recordAction->status == 'confirmed' && Auth::user()->hasRole('SuperAdmin')))
                    <div class="form-group">
                        <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                            class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">تعديل
                            </i></button>
                    </div>
                @endif
            </form>
        </div>

        <script>
            function appendRow(num) {
                $new_number = parseInt(num) + 1;
                $appended_text = ` <tr class="datatable-row datatable-row-even" id="recordAction-${$new_number}">
                                             
                                                <td class="text-center end-td ">
                                                            <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                                    class="btn btn-danger btn-option">
                                                                    <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                </td>
                 <th><input class="form-control" type="text" name="recordAction[${$new_number}][name_action]"></th>
                <th><input class="form-control" type="text" name="recordAction[${$new_number}][code_action]"></th>
                <th><input class="form-control"  type="text" name="recordAction[${$new_number}][number]"></th>
                <th><input class="form-control"  type="date" name="recordAction[${$new_number}][date_action]"></th>
                <th><input class="form-control" type="text" name="recordAction[${$new_number}][period_action]"></th>
                <th><textarea class="form-control" type="text" name="recordAction[${$new_number}][notes_action]"></textarea></th>
  
           
                                                 </tr>`;
                $($appended_text).insertAfter(`#recordAction-${num}`);
                if (!document.getElementById(`recordAction-${num}`)) {
                    $($appended_text).insertAfter(`#recordAction-0`);
                }

                $(`#btn-${num}`).remove();
                $("#increment").append(
                    `<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`
                );


            }

            function removeRow(num, id) {
                if (id != 0) {
                    $("#recordAction-0").append(`<input type="hidden" name="ids[${num}]" value="${id}">`);
                }
                $(`#recordAction-${num}`).remove();
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
                float: left;
                display: inline-table;
            }
        </style>
    @stop
