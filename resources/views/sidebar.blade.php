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
        
        <a id="navbarDropdown" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
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
              
              <a class="dropdown-item list-group-item list-group-item-action bg-light" href="{{ url('/') }}">
                جميع الأقسام
              </a>
          </div>
        
        <a href="{{ url('/users') }}" class="list-group-item list-group-item-action bg-light">الاعضاء</a>
        <a href="{{ url('/roles') }}" class="list-group-item list-group-item-action bg-light">الرتب</a>
        <a href="{{ url('/access') }}" class="list-group-item list-group-item-action bg-light">الصلاحيات</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">تسجيل خروج</a>
</div>