<div class="sidebar-heading"> </div>
<div class="list-group list-group-flush">
      <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action bg-light">الصفحة الرئيسية</a>

        <!-- <div class="accordion" id="accordionExample">

          <div class="accordion-item">
            <h2 class="accordion-header " id="headingOne">
              <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              الأقسام
              </button>
            </h2>

            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <a href="{{ url('/cs') }}">علوم الحاسب</a>
              </div>
            </div>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <a href="{{ url('/it') }}">شبكات</a>
              </div>
            </div>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <a href="{{ url('/it') }}">فص</a>
              </div>
            </div>

          </div>
        </div> -->
        
        <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
              أقسام الموظفين
        </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
              <a class="dropdown-item  list-group-item list-group-item-action bg-light" href="{{ url('/cs') }}">
                علوم الحاسب  
              </a>
              <a class="dropdown-item  list-group-item list-group-item-action bg-light" href="{{ url('/it') }}">
                شبكات
              </a>
              <a class="dropdown-item  list-group-item list-group-item-action bg-light" href="{{ url('/hr') }}">
                شئون عاملين
              </a>
              
              <a class="dropdown-item list-group-item list-group-item-action bg-light" href="{{ url('/index') }}">
                جميع الأقسام
              </a>
          </div> -->
          


        <!-- -->
          <div id="accordion">
            <a href="#web_dev1" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" data-parent="#accordion" data-toggle="collapse" >
              أقسام الموظفين
            </a>
            <div class="collapse" id="web_dev1">
              <!-- list-group-item-action -->

              <a class="list-group-item bg-light" href="{{ url('/web') }}">
                  ويب  
              </a>
              <a class="list-group-item bg-light" href="{{ url('/andriod') }}">
                  اندرويد
              </a>
              <a class="list-group-item bg-light" href="{{ url('/hr') }}">
                  شئون عاملين
              </a>
              <a class="list-group-item bg-light" href="{{ url('/lw') }}">
                  شئون قانونية
              </a>
              <a class="list-group-item bg-light" href="{{ url('/index') }}">
                  --جميع الأقسام--
              </a>

            </div>
          </div>
        <!-- -->

        <div id="accordion">
            <a href="#web_dev2" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" data-parent="#accordion" data-toggle="collapse" >
              الاعضاء
            </a>
            <div class="collapse" id="web_dev2">
              <a class="list-group-item bg-light" href="{{ url('/users') }}">
                  بيانات الاعضاء
              </a>
              <a class="list-group-item bg-light" href="{{ url('/addNewUser') }}">
                  تسجيل عضو جديد
              </a>
            </div>
        </div>

        <a href="{{ url('/roles') }}" class="list-group-item list-group-item-action bg-light">الرتب</a>
        <a href="{{ url('/access') }}" class="list-group-item list-group-item-action bg-light">الصلاحيات</a>
        <!-- <a href="{{ url('/attend') }}" class="list-group-item list-group-item-action bg-light">الحضور والغياب</a> -->

        <div id="accordion">
            <a href="#web_dev3" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" data-parent="#accordion" data-toggle="collapse" >
              الحضور والغياب
            </a>
            <div class="collapse" id="web_dev3">
              <a class="list-group-item bg-light" href="{{ url('/attend') }}">
                  تسجيل
              </a>
              <a class="list-group-item bg-light" href="{{ url('/attendanceDetails') }}">
                  بيانات
              </a>
            </div>
        </div>

        <div id="accordion">
            <a href="#web_dev4" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" data-parent="#accordion" data-toggle="collapse" >
              إرسال إيميل
            </a>
            <div class="collapse" id="web_dev4">
              <a class="list-group-item bg-light" href="{{ url('/emailSalaryDetails') }}">
                  إيميل مفردات المرتب
              </a>
            </div>
        </div>
        
        <a href="{{ url('/password') }}" class="list-group-item list-group-item-action bg-light">كلمات السر</a>

        <a href="{{ url('/toCompanyMail') }}" class="list-group-item list-group-item-action bg-light">إيميل الشركة</a>

        <a href="{{ url('/toStatistics') }}" class="list-group-item list-group-item-action bg-light">إحصائيات</a>

<!--
        <div id="accordion">
          <a href="#web_dev" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" data-parent="#accordion" data-toggle="collapse" >
            Web Dev
          </a>
          <div class="collapse" id="web_dev">
              <div><a href="#" class="list-group-item list-group-item-action bg-light">JS</a></div>
              <div><a href="#" class="list-group-item list-group-item-action bg-light">JS</a></div>
              <div><a href="#" class="list-group-item list-group-item-action bg-light">JS</a></div>
          </div>
        </div>
-->

</div>