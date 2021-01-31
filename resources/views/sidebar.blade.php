<style>
       #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
        width: 15rem;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>



<div class="sidebar-heading"> </div>
<div class="list-group list-group-flush">
      <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action bg-light">الصفحة الرئيسية</a>

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
                 تسجيل حضور وغياب اليوم
              </a>
              <a class="list-group-item bg-light" href="{{ url('/attendanceDetails') }}">
                بيانات غياب اخر شهر
              </a>

              <a class="list-group-item bg-light" href="{{ url('/toStatistics') }}">
                 إحصائيات لجميع الموظفين  
              </a>
              <a class="list-group-item bg-light" href="{{ url('/toSingleStatistics') }}">
                 إحصائيات لموظف واحد 
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

        <!--<a href="{{ url('/toStatistics') }}" class="list-group-item list-group-item-action bg-light">إحصائيات</a>-->

        <!--<div id="accordion">
            <a href="#web_dev5" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" data-parent="#accordion" data-toggle="collapse" >
              إحصائيات 
            </a>
            <div class="collapse" id="web_dev5">
              <a class="list-group-item bg-light" href="{{ url('/toStatistics') }}">
                 لجميع الموظفين  
              </a>
              <a class="list-group-item bg-light" href="{{ url('/toSingleStatistics') }}">
                 لموظف واحد  
              </a>
            </div>
        </div> -->

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