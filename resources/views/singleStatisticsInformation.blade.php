<style>
    {box-sizing: border-box;}

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
    display: none;
    position: fixed;
    bottom: 10px;
    left: 180px;
    background-color: #01d96d;
    border: 3px solid #f1f1f1;
    z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
    max-width: 200px;
    max-height: 300px;
    padding: 10px;
    background-color: #34fac4;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
    width: 100px;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Set a style for the submit/login button */
  

    /* Add a red background color to the cancel button */
    .form-container .cancel {
    background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
    opacity: 1;
    } 
</style>

<div class="card md-5 mt-5" >
    <div class="card-body" style="padding-bottom: 1px;">
        <h5 class="card-title"> الإحصائات من "{{$fromDate}}" إلى "{{$toDate}}"</h5>
        <h5 class="card-title"> للموظف: "{{$worker->name}}" </h5>
        <h5 class="card-title">   رقمه التسلسلي: "{{$worker->id}}" </h5>
      
        <div class="card md-5 mt-3" >
            <div class="card-body" style="padding-bottom: 1px;">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">التاريخ</th>
                            <th scope="col">حضور</th>
                            <th scope="col">معاد الوصول</th>
                            <th scope="col">معاد المغادرة</th>
                            <th scope="col">ساعات العمل</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0; $i<count( $information ); $i++)
                        <tr>
                            <td>{{$information[$i]->date}}</td>
                            @if ($information[$i]->come == true) 
                                <td class="p-2" style="background-color: #26d901;  padding: 5px; border-radius: 15px; text-align: center;">حاضر</td>
                            @elseif ($information[$i]->come == false)
                                <td class="p-2" style="background-color: #ff2817; padding: 5px; border-radius: 15px; text-align: center;">غائب</td>
                            @endif
                            <td>{{$information[$i]->arriveTime}}</td>
                            <td>{{$information[$i]->leaveTime}}</td>
                            <td>{{$information[$i]->hoursWorked}}</td>

                            <td>
                                <button class="btn btn-sm btn-warning " onclick="openForm()">تعديل </button>
                                <!-- action= "{{ url('/changeAttendance55') }}" -->
                                <div class="form-popup" id="myForm" style="" >
                                    <form id="registerform" class="form-container" method="post">
                                        @csrf

                                        <h4>ضبط المواعيد</h4>

                                        <label for="email"><b>معاد الحضور</b></label>
                                        <input type="time" class="form-control" name="arriveTime" > <!-- required -->

                                        <label for="psw"><b>معاد المغادرة</b></label>
                                        <input type="time" class="form-control" name="leaveTime" class="mt-1" >

                                        <input type="hidden" name="attendance" value={{$information[$i]->id }}>

                                        <input type="submit" class="btn btn-sm btn-warning mt-1 " value="تعديل">
                                        <a href="{{ url('/makeItHoliday') }}" class="btn btn-sm btn-success mt-1">أجازة</a>
                                        <a  class="btn btn-sm btn-danger mt-1" onclick="closeForm()">إغلاق </a>
                                    
                                       

                                    </form>
                                </div> 
                                
                            </td>
                        </tr>
                        @endfor
                        <script>
                                
                        </script>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
</div>

<!--<script type="text/javascript">

</script> -->

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    } 

    $(document).ready(function(){
        $("#registerform").on('submit',function(e){
            e.preventDefault();
            //alert("Alooo");
            var formData=$('#registerform');
            //.serialize();
            //alert(formData[0]['arriveTime']);
            $.ajax({
                url: "{{ url('changeAttendance55') }}",
                type: 'post',
                data: formData,
                dataType: 'json',
            });

        });
    });


    /*var frm = $('#contactForm1');
    frm.submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
        alert("Aloo");
    });*/

</script>
