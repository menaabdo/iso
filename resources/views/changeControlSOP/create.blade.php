@extends('layouts.master')

@section('content')



<!-- Main content -->
<div class="container mt-3 p-3">
    <h3 style="margin-top:85px;">اجراء التحكم في التغيير </h3>
    <hr>
    
    <form action="{{route('changeControlSOP.store')}}" method="post" enctype="multipart/form-data" id="fo1">
        {{ csrf_field() }}
        <input type="hidden" name="type" value="9">
        <table style="width: 850px;" class="table table-bordered my-4   m-auto">
            <thead>
                <tr>
                    <th class=" w-50 text-center col-3 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">اسم الاداره</label>

                            <input class="form-control" type="text" name="manage_name" style="text-align: start;"
                                placeholder="ادخل اسم الاداره">
                        </div>

                    </th>
                    <th class="col-3 ">
                        <div style="display: flex;justify-content: center;align-items: center;height: 50px;">
                            خطوات العمل القياسيه
                        </div>

                    </th>

                    <th class="col-4">
                        <div
                            style="display: flex;justify-content: center;align-items: center;height: 50px;width: 200px;">
                            <label for="img">اختار شعار الشركه:</label>
                            <input type="file" id="img" name="company_logo" accept="image/*">
                        </div>

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">تاريخ التفعيل</label>
                            <input class="form-control" type="date" name="active_date" style="text-align: end;">
                        </div>
                    </th>

                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">تاريخ الاصدار</label>
                            <input class="form-control" type="date" name="release_date" style="text-align: end;">
                        </div>
                    </th>

                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">رقم الوثيقه</label>
                            <input class="form-control" type="text" name="document_number" style="text-align: start;"
                                placeholder="ادخل رقم الوثيقه ">
                        </div>
                    </th>

                </tr>
                <tr>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">عدد الصفحات</label>
                            <input class="form-control" type="number" name="page_number" style="text-align: start;"
                                placeholder="ادخل عدد الصفحات ">
                        </div>
                    </th>

                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">تاريخ المراجعه</label>
                            <input class="form-control" type="date" name="review_date" style="text-align: end;">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">كود الوثيقه</label>
                            <input class="form-control" type="text" name="document_code" style="text-align: start;"
                                placeholder="ادخل كود الوثيقه ">
                        </div>
                    </th>


                </tr>

            </tbody>
        </table>
        <hr style="border: 5px; margin: 50px ;">

        <section style="width: 650px;margin-top: 200px;border: 3px solid yellowgreen;" class=" my-4  p-4 m-auto">
            <div class="form-group row ">
                <label for="" class="col-sm-2 col-form-label">اسم الشركه</label>
                <div class="col-sm-10">
                    <input type="text" name="company_name" class="form-control">
                </div>
            </div>
            <div class="form-group row ">
                <label for="inputPassword" class="col-sm-2 col-form-label">اسم الاجراء</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="procedure_name" id="inputPassword">
                </div>
            </div>
        </section>
        <hr style="border: 5px; margin: 50px ;">

        <section style="width: 650px;margin-top: 200px;border: 3px solid yellowgreen;" class=" my-4  p-4 m-auto">
            <div class="form-group row ">
                <label for="" class="col-sm-2 col-form-label">رقم النسخه</label>
                <div class="col-sm-10">
                    <input type="text" name="version_number" class="form-control">
                </div>
            </div>
            <div class="form-group row ">
                <label for="inputPassword" class="col-sm-2 col-form-label">حائز النسخه</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="copy_holder" id="inputPassword">
                </div>
            </div>
        </section>
        <hr style="border: 5px; margin: 50px ;">
        <table style="width: 550px;" class="table table-bordered my-4   m-auto">
            <thead>
                <tr>
                    @if (Auth::user()->hasRole('Employee'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:xx-large;font-weight: bolder;">
                                اعداد :</label>

                            <input class="form-control" type="text" name="prepare" style="text-align: end;"
                                placeholder="">
                        </div>

                    </th>
                    @endif
                    @if (Auth::user()->hasRole('Admin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:xx-large;font-weight: bolder;">
                                اعداد :</label>

                            <input class="form-control" type="text" name="prepare" style="text-align: end;"
                                placeholder="">
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                مراجعه :</label>

                            <input class="form-control" type="text" name="review" placeholder="">
                        </div>

                    </th>
                    @endif
                    @if(Auth::user()->hasRole('SuperAdmin'))
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: center;font-size:xx-large;font-weight: bolder;">
                                اعداد :</label>

                            <input class="form-control" type="text" name="prepare" style="text-align: end;"
                                placeholder="">
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: star;font-size:xx-large;font-weight: bolder;">
                                مراجعه :</label>

                            <input class="form-control" type="text" name="review" placeholder="">
                        </div>

                    </th>
                    <th class=" w-50 text-center col-2 ">
                        <div class="" style="text-align:start ;">
                            <label for="" class="" style="text-align: end;font-size:xx-large;font-weight: bolder;">
                                اعتماد : </label>

                            <input class="form-control" type="text" name="approval"
                                style="text-align: end;width: 120px;">
                        </div>

                    </th>
                    @endif
                </tr>
            </thead>

        </table>

        <hr style="border: 5px; margin: 50px ;">
        <table style="width: 550px;justify-content: center;align-items: center;"
            class="table table-bordered my-4   m-auto">
            <thead>
                <tr>
                    <th class=" w-50 text-center col-4 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: end;font-size:large;font-weight: bolder;"> رقم
                                التعديل </label>

                        </div>

                    </th>
                    <th class=" w-100 text-center col-4 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: star;">1</label>


                        </div>

                    </th>
                    <th class=" w-100 text-center col-4 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">2 </label>

                        </div>

                    </th>
                    <th class=" w-100 text-center col-4 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">3 </label>

                        </div>
                    </th>
                    <th class=" w-100 text-center col-4 ">
                        <div class="" style="text-align:center ;">
                            <label for="" class="" style="text-align: center;">4 </label>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <label for="" class=""
                                style="text-align: center;font-size:large;font-weight: bolder;">التاريخ</label>

                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <input class="form-control" type="date" name="date_1" style="text-align: end;">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <input class="form-control" type="date" name="date_2" style="text-align: end;width: 120px;">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <input class="form-control" type="date" name="date_3" style="text-align: end;width: 120px;">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="" style="text-align:center ;">
                            <input class="form-control" type="date" name="date_4" style="text-align: end;">
                        </div>
                    </th>
                </tr>
                <tr>
                    <th class=" w-100 text-center ">
                        <div class="form-group mt-4"
                            style="text-align:center ;justify-content: center;align-items: center; width: 140px;">
                            <label for="" class="" style="text-align: center;font-size:large;font-weight: bolder;">صفحه
                                / صفحات</label>

                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="form-group mt-4"
                            style="text-align:center ;justify-content: center;align-items: center;">
                            <input class="form-control" type="text" name="page_1" style="text-align: end;">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="form-group mt-4"
                            style="text-align:center ;justify-content: center;align-items: center;">
                            <input class="form-control" type="text" name="page_2" style="text-align: end;width: 120px;"
                                placeholder=" ">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="form-group w-100 mt-4"
                            style="text-align:center ;justify-content: center;align-items: center;">
                            <input class="form-control" type="text" name="page_3" style="text-align: end;">
                        </div>
                    </th>
                    <th class=" w-50 text-center ">
                        <div class="form-group w-100 mt-4"
                            style="text-align:center ;justify-content: center;align-items: center;">
                            <input class="form-control" type="text" name="page_4" style="text-align: end;">

                        </div>
                    </th>
                </tr>


            </tbody>
        </table>
        <hr style="border: 5px; margin: 50px ;">
        <section class="row" style="margin-right: 100px;">
            <h2>الرسم التوضيحي للاجراء :</h2>
            <div class="input-group my-3  mx-3">
                <label class="input-group-text" for="inputGroupFile01">اختيار صوره</label>
                <input type="file" class="form-control" name="image_illustration" id="inputGroupFile01">
            </div>



        </section>
        <br><br><br><br><br><br><br>
        <section>
            <div class="row" style="margin: 100px;text-align: start;">
                <p>نموذج تسلسل الاجراء هو عرض بياني لخريطة عمليات لبيانات مجموعة الاجراءات الخاصة بكل ادراة من الاقسام
                    والعمليات المرتبطة بها لكل مجموعة اجراءات اهداف وسياسات خاصة بها كما انها مزودة بكيفية سير العمل
                    وباجراءات مفصلة لذلك.</p>
                <h3>المصطلحات والرسوم التوضيحيه</h3>
                <table class="table table-bordered my-4">
                    <thead>
                        <tr>
                            <th scope="col" style="font-size:large">الرسم </th>
                            <th scope="col" style="font-size:large">المصطلح</th>
                            <th scope="col" style="font-size:large">الشرح</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div style="width: 150px; height: 80px;border: 2px solid grey;">
                                    <div style="width: 20px; height: 80px;border: 2px solid grey;float: left;">

                                    </div>
                                </div>
                            </td>
                            <td>مجال العمل</td>
                            <td>يبين هذا الشكل مجال العمل الذى تقوم به الادراة </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width: 120px; height: 40px;border: 2px solid grey;border-radius: 25px;">

                                </div>
                            </td>
                            <td>البدايه</td>
                            <td>يبين هذا الشكل بداية الاجراء </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="width: 150px; height: 90px;border: 2px solid grey;background-color: gray;">

                                </div>
                            </td>
                            <td>عمليه</td>
                            <td>يبين هذا الشكل عملية ضمن الاجراء </td>
                        </tr>
                        <tr>
                            <td>Larry the Bird</td>
                            <td>وثائق</td>
                            <td>يبين هذا الاجراء شكل الوثائق </td>
                        </tr>
                        <tr>
                            <td>Larry the Bird</td>
                            <td>عملية فرعية </td>
                            <td>يبين هذا الاجراء شكل العملية الفرعية التابعة لعملية رئيسة </td>
                        </tr>
                        <tr>
                            <td>Larry the Bird</td>
                            <td>معلومات</td>
                            <td>يبين هذا الاجراء شكل معلومات اضافية </td>
                        </tr>
                        <tr>
                            <td>Larry the Bird</td>
                            <td>رابط</td>
                            <td>يبين تسلسل المهام المبينة فى الاجراء </td>
                        </tr>
                        <tr>
                            <td>Larry the Bird</td>
                            <td>نهايه</td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> الغرض من الاجراء :</label>
            </div>
            <textarea class=form-control name="purpose" id="" cols="55" rows="5"
                placeholder="ادخل الغرض من الاجراء ------------------------"></textarea>

        </section>
        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> المقدمه :</label>
            </div>
            <textarea class=form-control name="introduction" id="" cols="55" rows="5"
                placeholder="ادخل   المقدمه ------------------------"></textarea>
        </section>
        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> نطاق التطبيق :</label>
            </div>
            <textarea class=form-control name="scope_of_application" id="" cols="55" rows="5"
                placeholder="ادخل   نطاق التطبيق ------------------------"></textarea>
        </section>
        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> المصطلحات والتعريفات :</label>
            </div>
            <table class="datatable-table table table-bordered mt-2 ">
                <thead class="datatable-head">
                    <tr class="datatable-row" style="left: 0px;">

                        <th data-field="" class="datatable-cell  end-cell text-center">
                            <span>م</span>
                        </th>

                        <th data-field="" class="datatable-cell"><span>المصطلح:</span></th>
                        <th data-field="" class="datatable-cell"><span>التعريف:</span></th>
                    </tr>
                </thead>
                <tbody class="datatable-body">
                    <tr class="datatable-row datatable-row-even" id="price-0">

                        <td class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <td class="datatable-cell  ">
                            <div class="a-col alternate">
                                <div class="input-field">
                                    <input type="text" class="form-control" name="names[0][term]" />
                                </div>
                            </div>
                        </td>

                        <td class="datatable-cell  ">
                            <div class="a-col alternate">
                                <div class="input-field">
                                    <input type="text" class="form-control" name="names[0][definition]" />
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment">
                            <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
                                    class="fa fa-plus-circle"></i></button>
                        </td>


                    </tr>
                </tbody>
            </table>
            <!-- <textarea class=form-control name="" id="" cols="55" rows="5" placeholder="ادخل   نطاق التطبيق ------------------------"></textarea> -->
        </section>
        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> المسؤليات :</label>
            </div>
            <textarea class=form-control name="responsibilities" id="" cols="55" rows="5"
                placeholder="ادخل  المسؤليات ------------------------"></textarea>
        </section>
        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> خطوات العمل :</label>
            </div>
            <textarea class=form-control name="action_steps" id="" cols="30" rows="20"
                placeholder="ادخل  خطوات العمل ------------------------"></textarea>
        </section>

        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> النماذج المستخدمه :</label>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th data-field="" class="datatable-cell  end-cell text-center">
                            <span>م</span>
                        </th>
                        <th class="col-4" style="text-align: center;">اسم النموذج </th>
                        <th class="col-1" style="text-align: center;">رقم النموذج</th>
                        <th class="col-2" style="text-align: center;">تاريخ الاصدار</th>
                        <th class="col-2" style="text-align: center;">مده الحفظ</th>
                        <th class="col-2" style="text-align: center;">جهه الحفظ</th>

                    </tr>
                </thead>
                <tbody>
                    <tr id="models-0">
                        <td class="text-center end-td ">
                            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
                                <i class="fa fa-minus-circle"></i>
                            </button>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="models[0][model_name]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="number" name="models[0][model_number]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="date" name="models[0][model_date]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="models[0][model_period]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="models[0][model_side]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>

                    </tr>
                    
                   
                
                    <tr class="datatable-row datatable-row-even">

                        <td class="text-center end-td " id="increment2">
                            <button type="button" class="btn btn-primary add_new" id="btn2-0" onclick="appendRow2(0)"><i
                                    class="fa fa-plus-circle"></i></button>
                        </td>


                    </tr>
                </tbody>
            </table>

            <!-- <textarea class=form-control name="" id="" cols="55" rows="5" placeholder="ادخل   نطاق التطبيق ------------------------"></textarea> -->
        </section>

        <section class="row" style="margin: 50px;">
            <div class="input-group my-3  mx-3">
                <label class="row"> المصادر المرجعيه الخارجيه والداخليه :</label>
            </div>
            <textarea class=form-control name="reference_sources" id="" cols="55" rows="5"
                placeholder="ادخل   نطاق التطبيق ------------------------"></textarea>
        </section>

        <div class="form-group">
            <button style="border-radius:20px;margin: 50px; width:10% ; height: 5%;" type="submit"
                class="btn btn-primary"><i class="fas fa-save" style="width:15% ; height: 20%;">حفظ</i></button>
        </div>
    </form>
</div>

<!-- /.content -->
<div class="modal fade account_model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function appendRow(num) {
                    $new_number = parseInt(num) + 1;
                    $appended_text = ` <tr class="datatable-row datatable-row-even" id="price-${$new_number}">
                                       
                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                        <td class="datatable-cell  ">
                                                  <div class="a-col alternate">
                                                            <div class="input-field">
                                                                      <input type="text" class="form-control"
                                                                                 name="names[${$new_number}][term]"  />
                                                            </div>
                                                  </div>
                                        </td>

                                        <td class="datatable-cell  ">
                                                  <div class="a-col alternate">
                                                            <div class="input-field">
                                                                      <input type="text" class="form-control"
                                                                                 name="names[${$new_number}][definition]"  />
                                                            </div>
                                                  </div>
                                        </td>
                                       
                                       
                              </tr>`;
                    $($appended_text).insertAfter(`#price-${num}`);
                    if (!document.getElementById(`price-${num}`)) {
                              $($appended_text).insertAfter(`#price-0`);
                    }

                    $(`#btn-${num}`).remove();
                    $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


          }

          function removeRow(num) {
                    $(`#price-${num}`).remove();

          }


          function appendRow2(num) {
                    $new_number = parseInt(num) + 1;
                    $appended_text = ` <tr class="datatable-row datatable-row-even" id="models-${$new_number}">
                                       
                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow2(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                      
                                        <td>
                            <input class="form-control" type="text" name="models[${$new_number}][model_name]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="number" name="models[${$new_number}][model_number]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="date" name="models[${$new_number}][model_date]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="models[${$new_number}][model_period]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="models[${$new_number}][model_side]" style="text-align: start;"
                                placeholder="----------------------------------------------------">
                        </td>
                                       
                              </tr>`;
                    $($appended_text).insertAfter(`#models-${num}`);
                    if (!document.getElementById(`models-${num}`)) {
                              $($appended_text).insertAfter(`#models-0`);
                    }

                    $(`#btn2-${num}`).remove();
                    $("#increment2").append(`<button type="button" class="btn btn-primary add_new" id="btn2-${$new_number}" onclick="appendRow2(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


          }

          function removeRow2(num) {
                    $(`#models-${num}`).remove();

          }


</script>
@stop