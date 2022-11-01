@extends('layouts.master')

@section('content')
<style>
      .shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;}
    
    </style>
<div style='margin-top:85px;width:85%;margin:auto' class='row card'>
<h3 style="margin-top:85px;text-shadow: 1px 1px 1px #3ed3ea;" class='mx-3'>متابعة نتائج المراجعة الداخلية </h3>
  <hr>
  
  <form action="{{route('interior.store')}}" method="post" enctype="multipart/form-data" id="fo1" class='col-md-12'>
    {{ csrf_field() }}
  

  <div class="form-group row text-right">
    <label for="" \-> ادارة :</label>
    <div class="col-md-4">
      <input type="text" class="form-control shadow-lg" placeholder="ادارة  ......" name="management">
    </div>
  </div>
  <!-- table -->
  <div class="form-group row text-right mt-5 ">
    <table class="table table-bordered  text-center col-md-11" 
    style="grid-auto-flow: column;justify-content: center; align-content: center;margin:auto">
     
   
     
      <thead style='font-size:13px;background-color: #001635;color:white;padding:10px !important;'>
        <tr >
          <th scope="col" rowspan="2" style='vertical-align: middle; !important;' >م</th>
          <th scope="col" rowspan="2" style='vertical-align: middle; !important;' >وصف حالة عدم المطابقة </th>
          <th scope="col" rowspan="2" style='vertical-align: middle; !important;' >الإجراء التصحيحي / الوقائي المطلوب</th>
          <th scope="col" rowspan="2" style='vertical-align: middle; !important;' >رقم الإجراء</th>
          <th scope="col" rowspan="2" style='vertical-align: middle; !important;' >المسئول عن التنفيذ</th>
          <th scope="col" colspan="2">متابعة التنفيذ</th>
        </tr>
        <tr style="">
          <th scope="col"> مخطط</th>
          <th scope="col">فعلي</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tr id="interior-0">
      <td class="text-center end-td ">
            <button type="button" title="Remove" disabled="disabled" class="btn btn-danger btn-option">
              <i class="fa fa-minus-circle"></i>
            </button>
          </td>
          <td>
            <div class="form-row ">
              <textarea type="text" class="form-control shadow-lg " name="interior[0][non_conformity]" style=""></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <textarea type="text" class="form-control shadow-lg " name="interior[0][corrective_action]" ></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="number" class="form-control  shadow-lg" name="interior[0][action_number]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control shadow-lg " name="interior[0][implementation]"style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  shadow-lg" name="interior[0][planned]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  shadow-lg" name="interior[0][actual]" style="height:56px">

            </div>
          </td>


      </tr>
      <tr class="datatable-row datatable-row-even">

<td class=" " id="increment">
  <button type="button" class="btn btn-primary add_new" id="btn-0" onclick="appendRow(0)"><i
      class="fa fa-plus-circle"></i></button>
</td>


</tr>

         </table>
      </div>
      <!-- ------------------------- -->
      @if(Auth::user()->hasRole('SuperAdmin'))
      <div class="form-group row text-center mt-5">
      <label  class="col-md-3 col-form-label"> رئيس فريق المراجعه :</label>
      
        <input type="text" class="form-control col-md-4 shadow-lg"  name="head_of_the_review">
      
    </div>
    <div class="form-group row text-center ">
      <label for="" class="col-md-3 col-form-label"> الاسم :</label>
     
        <input type="text" class="form-control col-md-4 shadow-lg"  name="name">
      </div>
      <div class="form-group row text-center ">
      <label for="" class="col-md-3 col-form-label"> التاريخ :</label>
     
        <input type="date" class="form-control col-md-4 shadow-lg"  name="date">
      </div>

   
 @endif
 <div class="form-group row text-center ">
      <label for="" class="col-md-3 col-form-label"> اسم الشركة :</label>
     
 <input class="form-control col-md-4 shadow-lg" type="text" name="company_name" >
 </div>   
 <div class="form-group row text-center ">
      <label for="" class="col-md-3 col-form-label"> تاريخ الإصدار:</label>
     
 <input class="form-control col-md-4" type="text" name="date2"  onfocus="(this.type='date')" onblur="(this.type='text')">
      </div>
      <div class="form-group row text-center ">
      <label for="" class="col-md-3 col-form-label"> تاريخ التعديل:</label>
     
      <input class="form-control col-md-4 shadow-lg" type="text" name="date3" 
              onfocus="(this.type='date')" onblur="(this.type='text')">
      </div>
      <div class="form-group row text-center ">
      <label for="" class="col-md-3 col-form-label"> مدة الحفظ</label>
     
      <input class="form-control col-md-4 shadow-lg" type="text" name="period" >
      </div>
      <div class="row" style='text-align:center'>
                <div class='col-md-12 my-3'>
                <button style="border-radius:7px" type="submit"
                    class="btn btn-primary mx-5"><i class="fas fa-save" style=""></i> حفظ
                </button>
            </div>
            </div>
  </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




<script>
  function appendRow(num) {
                    $new_number = parseInt(num) + 1;
                    $appended_text = ` <tr class="datatable-row datatable-row-even" id="interior-${$new_number}">
                                       
                                        <td class="text-center end-td ">
                                                  <button type="button" title="Remove" onclick="removeRow(${$new_number})"
                                                            class="btn btn-danger btn-option">
                                                            <i class="fa fa-minus-circle"></i>
                                                  </button>
                                        </td>
                                       
                                        <td>
            <div class="form-row ">
              <textarea type="text" class="form-control  " name="interior[${$new_number}][non_conformity]" ></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <textarea type="text" class="form-control  " name="interior[${$new_number}][corrective_action]" ></textarea>

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="number" class="form-control  " name="interior[${$new_number}][action_number]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][implementation]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][planned]" style="height:56px">

            </div>
          </td>
          <td>
            <div class="form-row ">
              <input type="text" class="form-control  " name="interior[${$new_number}][actual]" style="height:56px">

            </div>
          </td>
                                       
                                       
                              </tr>`;
                    $($appended_text).insertAfter(`#interior-${num}`);
                    if (!document.getElementById(`interior-${num}`)) {
                              $($appended_text).insertAfter(`#interior-0`);
                    }

                    $(`#btn-${num}`).remove();
                    $("#increment").append(`<button type="button" class="btn btn-primary add_new" id="btn-${$new_number}" onclick="appendRow(${$new_number})"><i class="fa fa-plus-circle"></i></button></td>`);


          }

          function removeRow(num) {
                    $(`#interior-${num}`).remove();

          }

</script>
@stop