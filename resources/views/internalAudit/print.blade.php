@extends('layouts.print')

@section('content')
<style>
    input,textarea {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    }
    textarea{
        border: none;
    height: 80px;
    padding: 10px;
    }
    </style>
    <div class="container mt-3 p-3" style='border:1px solid'>
            <div class="form-group row w-100 text-right">

                <div style="" class="w-100 text-center my-4">
                    <h2 style='text-align:center'>
                    <span style='font-family:Cursive;border-bottom: 1px solid;
    ; box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
    border-radius: 6px;
    padding: 4;
}'>
قائمة المراجعات الداخلية لنظام الجودة 
</span> 
</h2>
                    <hr class="w-100" style="align:center">
                </div>
                <div class="col-4" style='width: 60%;
    margin: auto;
    padding: 12px'>
                    <label for="" class="col-1 col-form-label" style='margin-right:20px'> التاريخ :</label>
                  {{ $internalAudit->date1 }}
                </div>
                <div class="col-4" style='width: 60%;
    margin: auto;
    padding: 12px'>
                    <label for="" class="col-2 col-form-label"> الجهة المراجع عليها :</label>
                  {{ $internalAudit->referenced_authority }}
                </div>
            </div>
            <div class="form-group row w-100 text-right">

                <div class="col-4" style='width: 60%;
    margin: auto;
    padding: 12px'>
                    <label for="" class="col-2 col-form-label"> الوثائق المرجعية: :</label>
                  {{ $internalAudit->reference_documents }}
                        i
                </div>
            </div>
            <br><br>
            <section class="my-5 table-bordered">
                <table class="table table-bordered w-100 text-center "
                    style="grid-auto-flow: column;justify-content: center; align-content: center;">
                    <thead>
                        <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                    
                            <th scope="col" rowspan="2" style='vertical-align: middle;'>أسئلــة المراجعـــة </th>
                            <th scope="col" colspan="2" style='vertical-align: middle;'>نتائج التحقق</th>
                            <th scope="col" rowspan="2" style='vertical-align: middle;'>الدليل الموضوعي</th>
                        </tr>
                        <tr style="background-color:#001635;padding:12px;color:white; text-align:center;">
                     <th scope="col" style='vertical-align: middle;'> مطابق</th>
                            <th scope="col" style='vertical-align: middle;'>غير مطابق</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($internalAudit->internalAudit) > 0)
                            @foreach ($internalAudit->internalAudit as $key => $intr)
                                <tr id="internalAudit-{{ $key }}">
                                  
                                    
                                    <td>
                                        <div class="form-row ">
                                            <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][review_question]">{{ $intr->review_question }}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row ">
                                            <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][identical]"> {{ $intr->identical }}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row ">
                                            <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][not_identical]"> {{ $intr->not_identical }}</textarea>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row ">
                                            <textarea type="text" class="form-control w-100 " name="internalAudit[{{ $key }}][objective_evidence]"> {{ $intr->objective_evidence }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                      @endif
                    </tbody>
                </table>
                <br><br>
                @if (Auth::user()->hasRole('Employee'))
                    <div class="form-group row w-100 text-right" >                        <div class="col-3" >
                            <label for="" class="col-1 col-form-label"> إسم المراجع :</label>
                        {{ $internalAudit->reference_name }}
                        </div>
                        <div class="col-3">
                            <label for="" class="col-1 col-form-label"> الوظيفة :</label>
                       {{ $internalAudit->job }}
                        </div>
                    </div>
                @endif

                @if (($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Employee')) ||
                    ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('Employee')))
                    <div class="form-group row w-100 text-right">
                        <div class="col-3">
                            <label for="" class="col-1 col-form-label"> مدير الجودة الإسم :</label>
                        {{ $internalAudit->quality_manager_name }}
                        </div>
                    </div>
                @endif


                @if (Auth::user()->hasRole('Admin'))
                    <div class="form-group row w-100 text-right">
                        <div class="col-3">
                            <label for="" class="col-1 col-form-label"> إسم المراجع :</label>
                         {{ $internalAudit->reference_name }}
                        </div>
                        <div class="col-3">
                            <label for="" class="col-1 col-form-label"> الوظيفة :</label>
                            {{ $internalAudit->job }}
                        </div>
                    </div>
                @endif
                @if (($internalAudit->status == 'pending' && Auth::user()->hasRole('Admin')) ||
                    ($internalAudit->status == 'inProgress' && Auth::user()->hasRole('Admin')))
                    <div class="form-group row w-100 text-right">
                        <div class="col-3">
                            <label for="" class="col-1 col-form-label"> مدير الجودة الإسم :</label>
                           {{ $internalAudit->quality_manager_name }}
                        </div>
                    </div>
                @endif

                @if ($internalAudit->status == 'confirmed' && Auth::user()->hasRole('Admin'))
                    <div class="form-group row w-100 text-right">
                        <div class="col-3">
                            <label for="" class="col-1 col-form-label"> مدير الجودة الإسم :</label>
                                {{ $internalAudit->quality_manager_name }}
                        </div>
                    </div>
                @endif
                @if (Auth::user()->hasRole('SuperAdmin'))
                    <div class="form-group row w-100 text-right">
                        <div class="col-3" style='width: 60%;
    margin: auto;
    padding: 12px'>
                            <label for="" class="col-1 col-form-label"> إسم المراجع :</label>
                            {{ $internalAudit->reference_name }}
                        </div>
                        <div class="col-3" style='width: 60%;
    margin: auto;
    padding: 12px'>
                            <label for="" class="col-1 col-form-label"> الوظيفة :</label>
                            {{ $internalAudit->job }}
                        </div>
                    </div>
                    <div class="form-group row w-100 text-right">
                        <div class="col-3" style='width: 60%;
    margin: auto;
    padding: 12px'>
                            <label for="" class="col-1 col-form-label"> مدير الجودة الإسم :</label>
                           {{ $internalAudit->quality_manager_name }}
                        </div>
                    </div>
                @endif
            </section>
            <br><br>
           

    
    <table class=" table-bordered" style=' border:none;
    padding:12px;
    margin-top:12px;
    background-color: #001635;
    color: white;
    /* text-shadow: none; */
    width: 97%;
    margin: auto;
    margin-bottom: 12px;
    font-size: 12px;
    padding: 1px;'>
        <thead>
            <tr>
            <th>
                <div class="" style="text-align:start ;">
                   {{ $internalAudit->company_name }}
                </div>

            </th>
            <th>
                <div class="" style="text-align:start ;">
                   {{ $internalAudit->date2 }}
                </div>

            </th>
            <th>

                <div class="" style="text-align:start ;">
                   {{ $internalAudit->date3 }}
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
                        style="text-align: center;font-size:large;font-weight: bolder;"> رقم الوثيقة : QA – F
                        - 13 </label>
                </div>
            </th>
            </tr>
        </thead>
    </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
  window.addEventListener("load", window.print());
</script>
@stop
